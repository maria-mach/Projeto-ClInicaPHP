<?php
require_once __DIR__ . '/../../auth/verifica_cliente.php';
require_once __DIR__ . '/agendamentos_funcs.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    redirecionar(url_path('cliente/meus_agendamentos.php?erro=1'));
}

$usuario = usuario();

/*
    Garante que o cliente só possa cancelar
    um agendamento que pertence a ele.
*/
$agendamentos = listar_agendamentos_por_usuario((int) $usuario['id']);

$pertenceAoUsuario = false;

foreach ($agendamentos as $agendamento) {
    if ((int) $agendamento['id'] === $id) {
        $pertenceAoUsuario = true;

        if (
            $agendamento['status'] !== 'pendente' &&
            $agendamento['status'] !== 'confirmado'
        ) {
            redirecionar(url_path('cliente/meus_agendamentos.php?erro=2'));
        }

        break;
    }
}

if (!$pertenceAoUsuario) {
    redirecionar(url_path('cliente/meus_agendamentos.php?erro=3'));
}

$cancelado = alterar_status_agendamento($id, 'cancelado');

if ($cancelado) {
    redirecionar(url_path('cliente/meus_agendamentos.php?cancelado=1'));
}

redirecionar(url_path('cliente/meus_agendamentos.php?erro=4'));