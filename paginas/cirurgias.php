<?php
$tituloPagina = 'Clínica | Cirurgias';

require_once __DIR__ . '/../database/servicos/servicos_funcs.php';

$cirurgias = listar_servicos_por_categoria('cirurgia');

$busca = trim($_GET['busca'] ?? '');
$filtro = trim($_GET['filtro'] ?? '');

$cirurgiasFiltradas = array_filter($cirurgias, function ($cirurgia) use ($busca, $filtro) {
    $nome = mb_strtolower($cirurgia['nome']);
    $descricao = mb_strtolower($cirurgia['descricao']);
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
                        <i class="fas fa-stethoscope me-2"></i>Cirurgias
                    </h2>
                    <p class="text-muted">
                        Estrutura moderna e equipe especializada para garantir segurança no seu procedimento.
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
                            placeholder="Busque por tipo de cirurgia..."
                            value="<?= esc($busca) ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <select name="filtro" class="form-select shadow-sm" onchange="this.form.submit()">
                        <option value="">Filtrar por Especialidade/Tipo</option>
                        <option value="apendicectomia" <?= $filtro === 'apendicectomia' ? 'selected' : '' ?>>Apendicectomia</option>
                        <option value="cardíaca" <?= $filtro === 'cardíaca' ? 'selected' : '' ?>>Cirurgia Cardíaca</option>
                        <option value="cesariana" <?= $filtro === 'cesariana' ? 'selected' : '' ?>>Cesariana</option>
                        <option value="ortopédica" <?= $filtro === 'ortopédica' ? 'selected' : '' ?>>Cirurgia Ortopédica</option>
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-sm">
                        Buscar
                    </button>

                    <a href="<?= esc(url_path('paginas/cirurgias.php')) ?>" class="btn btn-outline-secondary btn-sm">
                        Limpar filtros
                    </a>
                </div>
            </form>

            <div class="row g-4">

                <?php if (empty($cirurgiasFiltradas)): ?>
                    <div class="col-12">
                        <div class="alert alert-info">
                            Nenhuma cirurgia encontrada.
                        </div>
                    </div>
                <?php endif; ?>

                <?php foreach ($cirurgiasFiltradas as $cirurgia): ?>
                    <div class="col-md-6">
                        <div class="card card-outline card-success collapsed-card shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <?= esc($cirurgia['nome']) ?>
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
                                        src="<?= esc(url_path($cirurgia['imagem'])) ?>"
                                        alt="<?= esc($cirurgia['nome']) ?>"
                                        class="img-fluid rounded shadow"
                                        style="max-width: 300px;">
                                </div>

                                <p><?= esc($cirurgia['descricao']) ?></p>

                                <hr>

                                <p class="mb-2">
                                    <strong>Valor do Procedimento:</strong>
                                    R$ <?= number_format($cirurgia['preco'], 2, ',', '.') ?>
                                </p>

                                <p class="mb-3">
                                    Necessário Agendamento Prévio:
                                    <strong class="text-success">Sim</strong>
                                </p>

                                <button
                                    class="btn btn-success btnAgendar"
                                    data-id="<?= esc((string) $cirurgia['id']) ?>"
                                    data-nome="<?= esc($cirurgia['nome']) ?>"
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