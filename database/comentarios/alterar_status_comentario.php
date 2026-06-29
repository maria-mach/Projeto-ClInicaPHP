<?php
require_once __DIR__ . '/../../auth/funcs.php';
require_once __DIR__ . '/comentarios_funcs.php';

iniciar_sessao();

if (!is_admin()) {
    redirecionar(url_path('login.php'));
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirecionar(url_path('admin/comentarios.php'));
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$status = $_POST['status'] ?? '';

$statusPermitidos = ['pendente', 'aprovado', 'respondido', 'arquivado'];

if (!$id || !in_array($status, $statusPermitidos, true)) {
    redirecionar(url_path('admin/comentarios.php') . '?erro=1');
}

$atualizou = atualizar_status_comentario($id, $status);

if (!$atualizou) {
    redirecionar(url_path('admin/comentarios.php') . '?erro=2');
}

redirecionar(url_path('admin/comentarios.php') . '?sucesso=1');