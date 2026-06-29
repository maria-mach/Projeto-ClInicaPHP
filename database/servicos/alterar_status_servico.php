<?php
require_once __DIR__ . '/../../auth/verifica_admin.php';
require_once __DIR__ . '/servicos_funcs.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirecionar(url_path('admin/servicos.php'));
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$status = $_POST['status'] ?? '';

$statusPermitidos = ['ativo', 'inativo'];

if (!$id || !in_array($status, $statusPermitidos, true)) {
    redirecionar(url_path('admin/servicos.php') . '?erro=1');
}

$atualizou = alterar_status_servico($id, $status);

if (!$atualizou) {
    redirecionar(url_path('admin/servicos.php') . '?erro=2');
}

redirecionar(url_path('admin/servicos.php') . '?sucesso=1');