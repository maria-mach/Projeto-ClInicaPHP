<?php

require_once __DIR__ . '/../../auth/verifica_admin.php';
require_once __DIR__ . '/agendamentos_funcs.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$status = trim($_GET['status'] ?? '');

if (!$id) {
    redirecionar(
        url_path('admin/agendamentos.php?erro=1')
    );
}

$statusPermitidos = [
    'pendente',
    'confirmado',
    'cancelado',
    'concluido'
];

if (!in_array($status, $statusPermitidos, true)) {
    redirecionar(
        url_path('admin/agendamentos.php?erro=2')
    );
}

$alterado = alterar_status_agendamento($id, $status);

if ($alterado) {
    redirecionar(
        url_path('admin/agendamentos.php?sucesso=1')
    );
}

redirecionar(
    url_path('admin/agendamentos.php?erro=3')
);