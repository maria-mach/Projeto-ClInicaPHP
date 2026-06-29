<?php
require_once __DIR__ . '/../../auth/verifica_admin.php';
require_once __DIR__ . '/servicos_funcs.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirecionar(url_path('admin/servicos.php'));
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nome = trim($_POST['nome'] ?? '');
$categoria = trim($_POST['categoria'] ?? '');
$preco = floatval($_POST['preco'] ?? 0);
$descricao = trim($_POST['descricao'] ?? '');
$imagemAtual = trim($_POST['imagem_atual'] ?? '');

$categoriasPermitidas = ['consulta', 'exame', 'cirurgia'];

if (
    !$id ||
    $nome === '' ||
    !in_array($categoria, $categoriasPermitidas, true) ||
    $preco <= 0 ||
    $descricao === '' ||
    $imagemAtual === ''
) {
    redirecionar(url_path('admin/servicos.php') . '?erro=1');
}

$nomeImagem = $imagemAtual;

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $imagem = $_FILES['imagem'];

    if ($imagem['size'] > 2 * 1024 * 1024) {
        redirecionar(url_path('admin/editar_servico.php?id=' . $id) . '&erro=2');
    }

    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/webp'];
    $tipoReal = mime_content_type($imagem['tmp_name']);

    if (!in_array($tipoReal, $tiposPermitidos, true)) {
        redirecionar(url_path('admin/editar_servico.php?id=' . $id) . '&erro=3');
    }

    $pastaDestino = __DIR__ . '/../../projeto-upload/uploads/';

    if (!is_dir($pastaDestino)) {
        mkdir($pastaDestino, 0755, true);
    }

    $extensao = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));
    $nomeImagem = uniqid('servico_', true) . '.' . $extensao;
    $caminhoFinal = $pastaDestino . $nomeImagem;

    if (!move_uploaded_file($imagem['tmp_name'], $caminhoFinal)) {
        redirecionar(url_path('admin/editar_servico.php?id=' . $id) . '&erro=4');
    }
}

$atualizou = atualizar_servico(
    $id,
    $nome,
    $categoria,
    $descricao,
    $preco,
    $nomeImagem
);

if (!$atualizou) {
    redirecionar(url_path('admin/servicos.php') . '?erro=2');
}

redirecionar(url_path('admin/servicos.php') . '?sucesso=1');