<?php

require_once __DIR__ . '/comentarios_funcs.php';
require_once __DIR__ . '/../../auth/funcs.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirecionar(url_path('paginas/contato.php'));
}

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$assunto = trim($_POST['assunto'] ?? '');
$tipo = trim($_POST['tipo'] ?? '');
$mensagem = trim($_POST['mensagem'] ?? '');

$salvou = inserir_comentario($nome, $email, $assunto, $tipo, $mensagem);

if (!$salvou) {
    redirecionar(url_path('paginas/contato.php') . '?erro=2');
}

redirecionar(url_path('paginas/contato.php') . '?sucesso=1');