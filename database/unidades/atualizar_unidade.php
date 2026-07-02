<?php
require_once __DIR__ . '/../../auth/verifica_admin.php';
require_once __DIR__ . '/unidades_funcs.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirecionar(url_path('admin/unidades.php'));
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nome = trim($_POST['nome'] ?? '');
$endereco = trim($_POST['endereco'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$diasFuncionamento = trim($_POST['dias_funcionamento'] ?? '1,2,3,4,5');
$horaInicio = trim($_POST['hora_inicio'] ?? '08:00');
$horaFim = trim($_POST['hora_fim'] ?? '17:00');
$horario = formatar_horario_unidade($diasFuncionamento, $horaInicio . ':00', $horaFim . ':00');

if (!$id || $nome === '' || $endereco === '' || $telefone === '' || $horaInicio === '' || $horaFim === '') {
    redirecionar(url_path('admin/unidades.php') . '?erro=1');
}

$atualizou = atualizar_unidade(
    $id,
    $nome,
    $endereco,
    $telefone,
    $horario,
    $diasFuncionamento,
    $horaInicio . ':00',
    $horaFim . ':00'
);

if (!$atualizou) {
    redirecionar(url_path('admin/unidades.php') . '?erro=2');
}

redirecionar(url_path('admin/unidades.php') . '?sucesso=1');
