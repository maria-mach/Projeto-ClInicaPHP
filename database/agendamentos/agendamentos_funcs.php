<?php
require_once __DIR__ . '/../conexao.php';
require_once __DIR__ . '/../unidades/unidades_funcs.php';

function horarios_padrao(?int $unidadeId = null): array
{
    if ($unidadeId) {
        return gerar_horarios_unidade($unidadeId);
    }

    return [
        '08:00',
        '09:00',
        '10:00',
        '11:00',
        '14:00',
        '15:00',
        '16:00',
        '17:00'
    ];
}

function gerar_horarios_unidade(int $unidadeId, int $intervaloMinutos = 60): array
{
    $unidade = buscar_unidade_por_id($unidadeId);

    if (!$unidade) {
        return [];
    }

    $inicio = strtotime((string) $unidade['hora_inicio']);
    $fim = strtotime((string) $unidade['hora_fim']);

    if (!$inicio || !$fim || $inicio > $fim) {
        return [];
    }

    $horarios = [];

    for ($horario = $inicio; $horario <= $fim; $horario += $intervaloMinutos * 60) {
        $horarios[] = date('H:i', $horario);
    }

    return $horarios;
}

function listar_horarios_ocupados(int $unidadeId, string $data): array
{
    global $conexao;

    $sql = "SELECT TIME_FORMAT(horario, '%H:%i') AS horario
            FROM agendamentos
            WHERE unidade_id = :unidade_id
            AND data_agendamento = :data_agendamento
            AND status IN ('pendente', 'confirmado')";

    $stmt = $conexao->prepare($sql);

    $stmt->execute([
        'unidade_id' => $unidadeId,
        'data_agendamento' => $data
    ]);

    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function listar_horarios_disponiveis(int $unidadeId, string $data): array
{
    $horariosPadrao = horarios_padrao($unidadeId);
    $horariosOcupados = listar_horarios_ocupados($unidadeId, $data);

    return array_values(array_diff($horariosPadrao, $horariosOcupados));
}

function inserir_agendamento(
    int $usuarioId,
    int $servicoId,
    int $unidadeId,
    string $data,
    string $horario
): bool {
    global $conexao;

    $sqlInserir = "INSERT INTO agendamentos
                   (usuario_id, servico_id, unidade_id, data_agendamento, horario, status)
                   VALUES
                   (:usuario_id, :servico_id, :unidade_id, :data_agendamento, :horario, 'confirmado')";

    $stmtInserir = $conexao->prepare($sqlInserir);

    try {
        return $stmtInserir->execute([
            'usuario_id' => $usuarioId,
            'servico_id' => $servicoId,
            'unidade_id' => $unidadeId,
            'data_agendamento' => $data,
            'horario' => $horario
        ]);
    } catch (PDOException $e) {
        $codigoMysql = (int) ($e->errorInfo[1] ?? 0);

        if ($codigoMysql !== 1062) {
            throw $e;
        }
    }

    $sqlCancelado = "SELECT id
                     FROM agendamentos
                     WHERE unidade_id = :unidade_id
                     AND data_agendamento = :data_agendamento
                     AND horario = :horario
                     AND status = 'cancelado'
                     LIMIT 1";

    $stmtCancelado = $conexao->prepare($sqlCancelado);
    $stmtCancelado->execute([
        'unidade_id' => $unidadeId,
        'data_agendamento' => $data,
        'horario' => $horario
    ]);

    $agendamentoCanceladoId = $stmtCancelado->fetchColumn();

    if ($agendamentoCanceladoId) {
        $sqlReativar = "UPDATE agendamentos
                        SET usuario_id = :usuario_id,
                            servico_id = :servico_id,
                            status = 'confirmado',
                            criado_em = CURRENT_TIMESTAMP
                        WHERE id = :id";

        $stmtReativar = $conexao->prepare($sqlReativar);

        return $stmtReativar->execute([
            'id' => $agendamentoCanceladoId,
            'usuario_id' => $usuarioId,
            'servico_id' => $servicoId
        ]);
    }

    return false;
}

function listar_agendamentos_por_usuario(int $usuarioId): array
{
    global $conexao;

    $sql = "SELECT 
                a.id,
                a.data_agendamento,
                TIME_FORMAT(a.horario, '%H:%i') AS horario,
                a.status,
                s.nome AS servico,
                s.categoria,
                u.nome AS unidade
            FROM agendamentos a
            INNER JOIN servicos s ON s.id = a.servico_id
            INNER JOIN unidades u ON u.id = a.unidade_id
            WHERE a.usuario_id = :usuario_id
            ORDER BY a.data_agendamento DESC, a.horario DESC";

    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        'usuario_id' => $usuarioId
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function alterar_status_agendamento(int $id, string $status): bool
{
    global $conexao;

    $statusPermitidos = ['pendente', 'confirmado', 'cancelado', 'concluido'];

    if (!in_array($status, $statusPermitidos, true)) {
        return false;
    }

    $sql = "UPDATE agendamentos
            SET status = :status
            WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    return $stmt->execute([
        'id' => $id,
        'status' => $status
    ]);
}

function listar_todos_agendamentos(): array
{
    global $conexao;

    $sql = "SELECT 
                a.id,
                a.data_agendamento,
                TIME_FORMAT(a.horario, '%H:%i') AS horario,
                a.status,
                u.nome AS unidade,
                s.nome AS servico,
                s.categoria,
                usr.nome AS cliente,
                usr.email AS email_cliente
            FROM agendamentos a
            INNER JOIN usuarios usr ON usr.id = a.usuario_id
            INNER JOIN servicos s ON s.id = a.servico_id
            INNER JOIN unidades u ON u.id = a.unidade_id
            ORDER BY a.data_agendamento DESC, a.horario DESC";

    $stmt = $conexao->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
