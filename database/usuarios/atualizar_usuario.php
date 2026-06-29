<?php
require_once __DIR__ . '/../../auth/funcs.php';
require_once __DIR__ . '/usuario_funcs.php';

iniciar_sessao();

if (!usuario_logado()) {
    redirecionar(url_path('login.php'));
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirecionar(url_path('cliente/perfil.php'));
}

$id = (int) $_SESSION['usuario_id'];

$nome = trim($_POST['nome'] ?? '');
$cpf = trim($_POST['cpf'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

$cep = trim($_POST['cep'] ?? '');
$endereco = trim($_POST['endereco'] ?? '');
$numero = trim($_POST['numero'] ?? '');
$bairro = trim($_POST['bairro'] ?? '');
$cidade = trim($_POST['cidade'] ?? '');
$estado = strtoupper(trim($_POST['estado'] ?? ''));

$foto = $_FILES['foto'] ?? null;

if ($nome === '' || $cpf === '' || !$email) {
    redirecionar(url_path('cliente/perfil.php') . '?erro=1');
}

$usuarioAtual = buscar_usuario_por_id($id);

if (!$usuarioAtual) {
    redirecionar(url_path('auth/logout.php'));
}

$caminhoFoto = $usuarioAtual['foto'] ?? 'assets/img/padrao.png';

if ($foto && $foto['error'] !== UPLOAD_ERR_NO_FILE) {

    if ($foto['error'] !== UPLOAD_ERR_OK) {
        redirecionar(url_path('cliente/perfil.php') . '?erro=3');
    }

    if ($foto['size'] > 2 * 1024 * 1024) {
        redirecionar(url_path('cliente/perfil.php') . '?erro=4');
    }

    $tiposPermitidos = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp'
    ];

    $tipoReal = mime_content_type($foto['tmp_name']);

    if (!array_key_exists($tipoReal, $tiposPermitidos)) {
        redirecionar(url_path('cliente/perfil.php') . '?erro=5');
    }

    $pastaDestino = __DIR__ . '/../../uploads/usuarios/';

    if (!is_dir($pastaDestino)) {
        mkdir($pastaDestino, 0755, true);
    }

    $extensao = $tiposPermitidos[$tipoReal];
    $novoNome = uniqid('perfil_', true) . '.' . $extensao;

    $caminhoFoto = 'uploads/usuarios/' . $novoNome;
    $caminhoFinal = $pastaDestino . $novoNome;

    if (!move_uploaded_file($foto['tmp_name'], $caminhoFinal)) {
        redirecionar(url_path('cliente/perfil.php') . '?erro=6');
    }

    if (
        !empty($usuarioAtual['foto']) &&
        $usuarioAtual['foto'] !== 'assets/img/padrao.png'
    ) {
        $fotoAntiga = __DIR__ . '/../../' . $usuarioAtual['foto'];

        if (file_exists($fotoAntiga)) {
            unlink($fotoAntiga);
        }
    }
}

$atualizou = atualizar_usuario(
    $id,
    $nome,
    $cpf,
    $telefone,
    $email,
    $cep,
    $endereco,
    $numero,
    $bairro,
    $cidade,
    $estado,
    $caminhoFoto
);

if (!$atualizou) {
    redirecionar(url_path('cliente/perfil.php') . '?erro=2');
}

$_SESSION['nome'] = $nome;
$_SESSION['foto'] = $caminhoFoto;

redirecionar(url_path('cliente/perfil.php') . '?sucesso=1');
