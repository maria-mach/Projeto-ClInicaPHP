<?php
require_once __DIR__ . '/funcs.php';

iniciar_sessao();

if (!usuario_logado()) {
    redirecionar(url_path('login.php'));
}
