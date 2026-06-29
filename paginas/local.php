<?php
$tituloPagina = 'Clínica Geral | Local';

require_once __DIR__ . '/../database/unidades/unidades_funcs.php';

$unidades = listar_unidades_ativas();

require_once __DIR__ . '/../partials/header.php';
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold text-success">
                        <i class="fas fa-map-marker-alt me-2"></i>Local
                    </h2>
                    <p class="text-muted">Bem-vindo à seção Local.</p>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-5">

                    <div class="text-center mb-5">
                        <i class="fas fa-map-marked-alt text-success fs-1 mb-3"></i>
                        <h3>Conheça Nossas Unidades</h3>
                        <p class="text-muted">
                            Estamos localizados em pontos estratégicos da cidade para melhor lhe atender.
                        </p>
                    </div>

                    <div class="row g-4">

                        <?php if (empty($unidades)): ?>
                            <div class="col-12">
                                <div class="alert alert-info mb-0">
                                    Nenhuma unidade cadastrada no momento.
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php foreach ($unidades as $unidade): ?>
                            <div class="col-md-6">
                                <div class="border rounded p-4 h-100 bg-light">
                                    <h5>
                                        <i class="fas fa-building text-primary me-2"></i>
                                        <?= esc($unidade['nome']) ?>
                                    </h5>

                                    <p class="mb-1">
                                        <i class="fas fa-map-pin text-danger me-2"></i>
                                        <?= esc($unidade['endereco']) ?>
                                    </p>

                                    <p class="mb-1">
                                        <i class="fas fa-clock text-secondary me-2"></i>
                                        <?= esc($unidade['horario']) ?>
                                    </p>

                                    <p class="mb-0">
                                        <i class="fas fa-phone-alt text-success me-2"></i>
                                        <?= esc($unidade['telefone']) ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>