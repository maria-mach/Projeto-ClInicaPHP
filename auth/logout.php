<?php
require_once __DIR__ . '/funcs.php';

iniciar_sessao();
fazer_logout();
redirecionar(url_path('index.php'));
