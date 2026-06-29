<?php
require_once __DIR__ . '/verifica_login.php';

if (!is_cliente()) {
    redirecionar(url_path('index.php'));
}