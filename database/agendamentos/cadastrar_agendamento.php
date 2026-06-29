<?php
require_once __DIR__ . '/../../auth/verifica_cliente.php';
require_once __DIR__ . '/agendamentos_funcs.php';
require_once __DIR__ . '/../unidades/unidades_funcs.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirecionar(url_path('paginas/index.php'));
}

$usuario = usuario();
$usuarioId = (int) $usuario['id'];

$servicoId = filter_input(INPUT_POST, 'servico_id', FILTER_VALIDATE_INT);
$unidadeId = filter_input(INPUT_POST, 'unidade_id', FILTER_VALIDATE_INT);
$data = trim($_POST['data_agendamento'] ?? '');
$horario = trim($_POST['horario'] ?? '');

if (!$usuarioId || !$servicoId || !$unidadeId || $data === '' || $horario === '') {
    redirecionar(url_path('cliente/meus_agendamentos.php') . '?erro=1');
}

if ($data < date('Y-m-d')) {
    redirecionar(url_path('cliente/meus_agendamentos.php') . '?erro=2');
}

if (!unidade_funciona_na_data($unidadeId, $data)) {
    redirecionar(url_path('cliente/meus_agendamentos.php') . '?erro=6');
}

if (!horario_dentro_funcionamento($unidadeId, $horario)) {
    redirecionar(url_path('cliente/meus_agendamentos.php') . '?erro=7');
}

$horariosDisponiveis = listar_horarios_disponiveis($unidadeId, $data);

if (!in_array($horario, $horariosDisponiveis, true)) {
    redirecionar(url_path('cliente/meus_agendamentos.php') . '?erro=3');
}

try {
    $salvou = inserir_agendamento(
        $usuarioId,
        $servicoId,
        $unidadeId,
        $data,
        $horario
    );
} catch (PDOException $e) {
    redirecionar(url_path('cliente/meus_agendamentos.php') . '?erro=4');
}

if (!$salvou) {
    redirecionar(url_path('cliente/meus_agendamentos.php') . '?erro=5');
}

redirecionar(url_path('cliente/meus_agendamentos.php') . '?sucesso=1');