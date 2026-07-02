<?php
require_once __DIR__ . '/../conexao.php';

function nomes_dias_funcionamento(string $diasFuncionamento): string
{
    $nomesDias = [
        '1' => 'Segunda',
        '2' => 'Terça',
        '3' => 'Quarta',
        '4' => 'Quinta',
        '5' => 'Sexta',
        '6' => 'Sábado',
        '7' => 'Domingo'
    ];

    $dias = array_values(array_filter(array_map('trim', explode(',', $diasFuncionamento))));

    if ($dias === ['1', '2', '3', '4', '5']) {
        return 'Segunda a sexta';
    }

    if ($dias === ['1', '2', '3', '4', '5', '6']) {
        return 'Segunda a sábado';
    }

    if ($dias === ['1', '2', '3', '4', '5', '6', '7']) {
        return 'Todos os dias';
    }

    $diasFormatados = [];

    foreach ($dias as $dia) {
        if (isset($nomesDias[$dia])) {
            $diasFormatados[] = $nomesDias[$dia];
        }
    }

    return implode(', ', $diasFormatados);
}

function formatar_horario_unidade(
    string $diasFuncionamento,
    string $horaInicio,
    string $horaFim
): string {
    $dias = nomes_dias_funcionamento($diasFuncionamento);
    $inicio = substr($horaInicio, 0, 5);
    $fim = substr($horaFim, 0, 5);

    if ($dias === '') {
        return "Das {$inicio} às {$fim}";
    }

    return "{$dias}, das {$inicio} às {$fim}";
}

function horario_exibicao_unidade(array $unidade): string
{
    return formatar_horario_unidade(
        (string) ($unidade['dias_funcionamento'] ?? ''),
        (string) ($unidade['hora_inicio'] ?? '08:00:00'),
        (string) ($unidade['hora_fim'] ?? '17:00:00')
    );
}

function listar_unidades_ativas(): array
{
    global $conexao;

    $sql = "SELECT id, nome, endereco, telefone, horario, dias_funcionamento, hora_inicio, hora_fim
            FROM unidades
            WHERE status = 'ativo'
            ORDER BY nome ASC";

    $stmt = $conexao->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function listar_todas_unidades(): array
{
    global $conexao;

    $sql = "SELECT id, nome, endereco, telefone, horario, dias_funcionamento, hora_inicio, hora_fim, status
            FROM unidades
            ORDER BY nome ASC";

    $stmt = $conexao->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function inserir_unidade(
    string $nome,
    string $endereco,
    string $telefone,
    string $horario,
    string $diasFuncionamento = '1,2,3,4,5',
    string $horaInicio = '08:00:00',
    string $horaFim = '17:00:00'
): bool {
    global $conexao;

    $sql = "INSERT INTO unidades (nome, endereco, telefone, horario, dias_funcionamento, hora_inicio, hora_fim, status)
            VALUES (:nome, :endereco, :telefone, :horario, :dias_funcionamento, :hora_inicio, :hora_fim, 'ativo')";

    $stmt = $conexao->prepare($sql);

    return $stmt->execute([
        'nome' => $nome,
        'endereco' => $endereco,
        'telefone' => $telefone,
        'horario' => $horario,
        'dias_funcionamento' => $diasFuncionamento,
        'hora_inicio' => $horaInicio,
        'hora_fim' => $horaFim
    ]);
}

function buscar_unidade_por_id(int $id): ?array
{
    global $conexao;

    $sql = "SELECT id, nome, endereco, telefone, horario, dias_funcionamento, hora_inicio, hora_fim, status
            FROM unidades
            WHERE id = :id
            LIMIT 1";

    $stmt = $conexao->prepare($sql);
    $stmt->execute(['id' => $id]);

    $unidade = $stmt->fetch(PDO::FETCH_ASSOC);

    return $unidade ?: null;
}

function atualizar_unidade(
    int $id,
    string $nome,
    string $endereco,
    string $telefone,
    string $horario,
    string $diasFuncionamento = '1,2,3,4,5',
    string $horaInicio = '08:00:00',
    string $horaFim = '17:00:00'
): bool {
    global $conexao;

    $sql = "UPDATE unidades
            SET nome = :nome,
                endereco = :endereco,
                telefone = :telefone,
                horario = :horario,
                dias_funcionamento = :dias_funcionamento,
                hora_inicio = :hora_inicio,
                hora_fim = :hora_fim
            WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    return $stmt->execute([
        'id' => $id,
        'nome' => $nome,
        'endereco' => $endereco,
        'telefone' => $telefone,
        'horario' => $horario,
        'dias_funcionamento' => $diasFuncionamento,
        'hora_inicio' => $horaInicio,
        'hora_fim' => $horaFim
    ]);
}

function unidade_funciona_na_data(int $unidadeId, string $data): bool
{
    $unidade = buscar_unidade_por_id($unidadeId);

    if (!$unidade) {
        return false;
    }

    $diasFuncionamento = array_map('trim', explode(',', (string) $unidade['dias_funcionamento']));
    $diaDaSemana = (int) date('N', strtotime($data));

    return in_array((string) $diaDaSemana, $diasFuncionamento, true);
}

function horario_dentro_funcionamento(int $unidadeId, string $horario): bool
{
    $unidade = buscar_unidade_por_id($unidadeId);

    if (!$unidade) {
        return false;
    }

    $horaInicio = (string) $unidade['hora_inicio'];
    $horaFim = (string) $unidade['hora_fim'];

    $horarioInformado = date('H:i:s', strtotime($horario));
    $horaInicioNormalizada = date('H:i:s', strtotime($horaInicio));
    $horaFimNormalizada = date('H:i:s', strtotime($horaFim));

    return $horarioInformado >= $horaInicioNormalizada && $horarioInformado <= $horaFimNormalizada;
}

function alterar_status_unidade(int $id, string $status): bool
{
    global $conexao;

    $sql = "UPDATE unidades
            SET status = :status
            WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    return $stmt->execute([
        'id' => $id,
        'status' => $status
    ]);
}
