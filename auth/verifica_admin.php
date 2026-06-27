<?php
require_once __DIR__ . '/funcs.php';

iniciar_sessao();

if (!is_admin()) {
    redirecionar(url_path('login.php'));
}
