<?php
require_once __DIR__ . '/../../auth/verifica_admin.php';
require_once __DIR__ . '/unidades_funcs.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirecionar(url_path('admin/cadastrar_unidade.php'));
}

$nome = trim($_POST['nome'] ?? '');
$endereco = trim($_POST['endereco'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$diasFuncionamento = trim($_POST['dias_funcionamento'] ?? '1,2,3,4,5');
$horaInicio = trim($_POST['hora_inicio'] ?? '08:00');
$horaFim = trim($_POST['hora_fim'] ?? '17:00');
$horario = formatar_horario_unidade($diasFuncionamento, $horaInicio . ':00', $horaFim . ':00');

if ($nome === '' || $endereco === '' || $telefone === '' || $horaInicio === '' || $horaFim === '') {
    redirecionar(url_path('admin/cadastrar_unidade.php') . '?erro=1');
}

$salvou = inserir_unidade(
    $nome,
    $endereco,
    $telefone,
    $horario,
    $diasFuncionamento,
    $horaInicio . ':00',
    $horaFim . ':00'
);

if (!$salvou) {
    redirecionar(url_path('admin/cadastrar_unidade.php') . '?erro=2');
}

redirecionar(url_path('admin/cadastrar_unidade.php') . '?sucesso=1');
