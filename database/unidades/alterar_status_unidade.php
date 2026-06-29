<?php
require_once __DIR__ . '/../../auth/verifica_admin.php';
require_once __DIR__ . '/unidades_funcs.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirecionar(url_path('admin/unidades.php'));
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$status = $_POST['status'] ?? '';

$statusPermitidos = ['ativo', 'inativo'];

if (!$id || !in_array($status, $statusPermitidos, true)) {
    redirecionar(url_path('admin/unidades.php') . '?erro=1');
}

$atualizou = alterar_status_unidade($id, $status);

if (!$atualizou) {
    redirecionar(url_path('admin/unidades.php') . '?erro=2');
}

redirecionar(url_path('admin/unidades.php') . '?sucesso=1');