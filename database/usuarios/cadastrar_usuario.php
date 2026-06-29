<?php
require_once __DIR__ . '/../../auth/funcs.php';
require_once __DIR__ . '/usuario_funcs.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirecionar(url_path('cadastro.php'));
}

$nome = trim($_POST['nome'] ?? '');
$cpf = trim($_POST['cpf'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = trim($_POST['senha'] ?? '');

if ($nome === '' || $cpf === '' || !$email || $senha === '') {
    redirecionar(url_path('cadastro.php') . '?erro=1');
}

$usuarioExistente = buscar_usuario_por_email($email) || buscar_usuario_por_cpf($cpf);

if ($usuarioExistente) {
    redirecionar(url_path('cadastro.php') . '?erro=2');
}

try {
    $salvou = inserir_usuario($nome, $cpf, $telefone, $email, $senha, 'cliente');
} catch (PDOException $e) {
    redirecionar(url_path('cadastro.php') . '?erro=2');
}

if (!$salvou) {
    redirecionar(url_path('cadastro.php') . '?erro=3');
}

redirecionar(url_path('login.php') . '?sucesso=1');
