<?php
require_once __DIR__ . '/funcs.php';
require_once __DIR__ . '/../database/conexao.php';

iniciar_sessao();

// Só processa login via POST para evitar acesso direto por GET.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirecionar(url_path('login.php'));
}

// Valida campos enviados pelo formulário de login.
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = $_POST['senha'] ?? '';

if (!$email || !$senha) {
    redirecionar(url_path('login.php') . '?erro=1');
}

// Busca o usuário por email na tabela `usuarios`.
$sql = 'SELECT id, nome, senha, tipo FROM usuarios WHERE email = :email LIMIT 1';
$stmt = $conexao->prepare($sql);
$stmt->execute(['email' => $email]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

$senhaValida = false;
if ($usuario) {
    // Suporta senha hash e senha em texto para utilizar em testes primeiramente. 
    $senhaValida = password_verify($senha, $usuario['senha']) || $usuario['senha'] === $senha;
}

if (!$usuario || !$senhaValida) {
    redirecionar(url_path('login.php') . '?erro=1');
}

$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['nome'] = $usuario['nome'];
$_SESSION['tipo'] = $usuario['tipo'];

// Armazena apenas os dados necessários para o menu e o controle de acesso.
$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['nome'] = $usuario['nome'];
$_SESSION['tipo'] = $usuario['tipo'];

// Admin vai direto para dashboard; cliente para perfil.
if ($usuario['tipo'] === 'admin') {
    redirecionar(url_path('admin/dashboard.php'));
}

redirecionar(url_path('cliente/perfil.php'));
