<?php
require_once __DIR__ . '/../../auth/funcs.php';
require_once __DIR__ . '/usuario_funcs.php';

iniciar_sessao();

if (!usuario_logado()) {
    redirecionar(url_path('login.php'));
}

$id = (int) $_SESSION['usuario_id'];

if (!excluir_usuario($id)) {
    redirecionar(url_path('cliente/perfil.php') . '?erro=3');
}

fazer_logout();

redirecionar(url_path('login.php'));