<?php
require_once __DIR__ . '/funcs.php';
require_once __DIR__ . '/../database/usuarios/usuario_funcs.php';

iniciar_sessao();

// Só processa login via POST para evitar acesso direto por GET.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirecionar(url_path('login.php'));
}

// Valida campos enviados pelo formulário de login.
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = trim($_POST['senha'] ?? '');

if (!$email || !$senha) {
    redirecionar(url_path('login.php') . '?erro=1');
}

// Busca o usuário por email na tabela `usuarios`.
$usuario = buscar_usuario_por_email($email);


$senhaValida = false;
if ($usuario) {
    // Suporta senha hash e senha em texto para utilizar em testes primeiramente. 
    $senhaValida = password_verify($senha, $usuario['senha']) || $usuario['senha'] === $senha;
}

if (!$usuario || !$senhaValida) {
    redirecionar(url_path('login.php') . '?erro=1');
}

// Armazena apenas os dados necessários para o menu e o controle de acesso.
$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['nome'] = $usuario['nome'];
$_SESSION['tipo'] = $usuario['tipo'];
$_SESSION['foto'] = $usuario['foto'] ?? 'assets/img/padrao.png';

// Admin vai direto para dashboard; cliente para perfil.
if ($usuario['tipo'] === 'admin') {
    redirecionar(url_path('admin/dashboard.php'));
}

redirecionar(url_path('cliente/perfil.php'));
