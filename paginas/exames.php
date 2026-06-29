<?php
$tituloPagina = 'Clínica | Exames';

require_once __DIR__ . '/../database/servicos/servicos_funcs.php';

$exames = listar_servicos_por_categoria('exame');

$busca = trim($_GET['busca'] ?? '');
$filtro = trim($_GET['filtro'] ?? '');

$examesFiltrados = array_filter($exames, function ($exame) use ($busca, $filtro) {
    $nome = mb_strtolower($exame['nome']);
    $descricao = mb_strtolower($exame['descricao']);
    $buscaLower = mb_strtolower($busca);

    $passaBusca = $busca === ''
        || str_contains($nome, $buscaLower)
        || str_contains($descricao, $buscaLower);

    $passaFiltro = $filtro === ''
        || str_contains($nome, mb_strtolower($filtro))
        || str_contains($descricao, mb_strtolower($filtro));

    return $passaBusca && $passaFiltro;
});

require_once __DIR__ . '/../partials/header.php';
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container pb-4">

            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold text-success">
                        <i class="fas fa-vials me-2"></i>Exames
                    </h2>
                    <p class="text-muted">
                        Resultados rápidos e precisos para cuidar da sua saúde com confiança.
                    </p>
                </div>
            </div>

            <form method="GET" class="row g-3 mb-4">
                <div class="col-md-8">
                    <div class="input-group shadow-sm">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input
                            type="text"
                            name="busca"
                            class="form-control"
                            placeholder="Busque por exame laboratorial ou de imagem..."
                            value="<?= esc($busca) ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <select name="filtro" class="form-select shadow-sm" onchange="this.form.submit()">
                        <option value="">Filtrar por Especialidade/Tipo</option>
                        <option value="sangue" <?= $filtro === 'sangue' ? 'selected' : '' ?>>Exame de Sangue</option>
                        <option value="raio" <?= $filtro === 'raio' ? 'selected' : '' ?>>Raio-X</option>
                        <option value="ultrassonografia" <?= $filtro === 'ultrassonografia' ? 'selected' : '' ?>>Ultrassonografia</option>
                        <option value="tomografia" <?= $filtro === 'tomografia' ? 'selected' : '' ?>>Tomografia</option>
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-sm">
                        Buscar
                    </button>

                    <a href="<?= esc(url_path('paginas/exames.php')) ?>" class="btn btn-outline-secondary btn-sm">
                        Limpar filtros
                    </a>
                </div>
            </form>

            <div class="row g-4">

                <?php if (empty($examesFiltrados)): ?>
                    <div class="col-12">
                        <div class="alert alert-info">
                            Nenhum exame encontrado.
                        </div>
                    </div>
                <?php endif; ?>

                <?php foreach ($examesFiltrados as $exame): ?>
                    <div class="col-md-6">
                        <div class="card card-outline card-success collapsed-card shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <?= esc($exame['nome']) ?>
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body" style="display: none;">
                                <div class="text-center mb-3">
                                    <img
                                        src="<?= esc(url_path($exame['imagem'])) ?>"
                                        alt="<?= esc($exame['nome']) ?>"
                                        class="img-fluid rounded shadow"
                                        style="max-width: 300px;">
                                </div>

                                <p><?= esc($exame['descricao']) ?></p>

                                <hr>

                                <p class="mb-2">
                                    <strong>Valor do Exame:</strong>
                                    R$ <?= number_format($exame['preco'], 2, ',', '.') ?>
                                </p>

                                <p class="mb-3">
                                    Necessário Agendamento Prévio:
                                    <strong class="text-success">Sim</strong>
                                </p>

                               <button
                                    class="btn btn-success btnAgendar"
                                    data-id="<?= esc((string) $exame['id']) ?>"
                                    data-nome="<?= esc($exame['nome']) ?>"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalAgendamento">
                                    <i class="bi bi-calendar-check me-2"></i>
                                    Escolher Unidade e Agendar
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/modal_agendamento.php'; ?>
<?php require_once __DIR__ . '/../partials/footer.php'; ?>