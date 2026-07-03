<?php
require_once __DIR__ . '/../../auth/verifica_admin.php';
require_once __DIR__ . '/servicos_funcs.php';

$tituloPagina = 'Clínica Geral | Serviço Cadastrado';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirecionar(url_path('admin/cadastrar_servico.php'));
}

$nome = trim($_POST['nome'] ?? '');
$categoria = trim($_POST['categoria'] ?? '');
$preco = floatval($_POST['preco'] ?? 0);
$descricao = trim($_POST['descricao'] ?? '');

$categoriasPermitidas = ['consulta', 'exame', 'cirurgia'];

if ($nome === '') {
    die('O nome do serviço é obrigatório.');
}

if (!in_array($categoria, $categoriasPermitidas, true)) {
    die('Categoria inválida.');
}

if ($preco <= 0) {
    die('O preço deve ser maior que zero.');
}

if ($descricao === '') {
    die('A descrição do serviço é obrigatória.');
}

if (!isset($_FILES['imagem']) || $_FILES['imagem']['error'] !== UPLOAD_ERR_OK) {
    die('A imagem do serviço é obrigatória.');
}

$imagem = $_FILES['imagem'];

if ($imagem['size'] > 2 * 1024 * 1024) {
    die('Arquivo muito grande. Limite: 2 MB.');
}

$tiposPermitidos = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/webp' => 'webp'
];

$tipoReal = mime_content_type($imagem['tmp_name']);

if (!array_key_exists($tipoReal, $tiposPermitidos)) {
    die('Tipo de arquivo não permitido. Envie apenas JPG, PNG ou WEBP.');
}

$pastaDestino = __DIR__ . '/../../uploads/servicos/';

if (!is_dir($pastaDestino)) {
    mkdir($pastaDestino, 0755, true);
}

$extensao = $tiposPermitidos[$tipoReal];
$novoNome = uniqid('servico_', true) . '.' . $extensao;

$caminhoBanco = 'uploads/servicos/' . $novoNome;
$caminhoFinal = $pastaDestino . $novoNome;

if (!move_uploaded_file($imagem['tmp_name'], $caminhoFinal)) {
    die('Erro ao salvar a imagem.');
}

$salvou = inserir_servico(
    $nome,
    $categoria,
    $descricao,
    $preco,
    $caminhoBanco
);

if (!$salvou) {
    die('Erro ao salvar o serviço no banco de dados.');
}

require_once __DIR__ . '/../../partials/header.php';
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container">

            <div class="alert alert-success shadow-sm">
                Serviço cadastrado com sucesso!
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h2 class="fw-bold text-success mb-3">
                        <?= esc($nome) ?>
                    </h2>

                    <p>
                        <strong>Categoria:</strong>
                        <?= esc($categoria) ?>
                    </p>

                    <p>
                        <strong>Preço:</strong>
                        R$ <?= number_format($preco, 2, ',', '.') ?>
                    </p>

                    <p>
                        <strong>Descrição:</strong>
                        <?= esc($descricao) ?>
                    </p>

                    <div class="text-center my-4">
                        <img
                            src="<?= esc(url_path($caminhoBanco)) ?>"
                            alt="Imagem do serviço"
                            class="img-fluid rounded shadow"
                            style="max-width: 400px;">
                    </div>

                    <a href="<?= esc(url_path('admin/cadastrar_servico.php')) ?>" class="btn btn-success">
                        Cadastrar outro serviço
                    </a>

                    <a href="<?= esc(url_path('admin/dashboard.php')) ?>" class="btn btn-outline-secondary">
                        Voltar ao Dashboard
                    </a>

                </div>
            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../partials/footer.php'; ?>
