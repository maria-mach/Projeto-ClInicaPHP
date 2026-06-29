<?php
$tituloPagina = 'Clínica Geral | Preços';

require_once __DIR__ . '/../database/servicos/servicos_funcs.php';

$servicos = listar_servicos_ativos();

require_once __DIR__ . '/../partials/header.php';
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold text-success">
                        <i class="fas fa-tags me-2"></i>Preços
                    </h2>
                    <p class="text-muted">
                        Confira os valores dos serviços cadastrados.
                    </p>
                </div>
            </div>

            <div class="table-responsive bg-white rounded shadow-sm p-4">
                <table class="table table-hover align-middle">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">Serviço/Especialidade</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Valor Médio</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (empty($servicos)): ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted">
                                    Nenhum serviço cadastrado no momento.
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($servicos as $servico): ?>
                            <tr>
                                <td><?= esc($servico['nome']) ?></td>

                                <td><?= esc(nome_categoria($servico['categoria'])) ?></td>

                                <td>
                                    R$ <?= number_format($servico['preco'], 2, ',', '.') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="alert alert-info mt-3">
                    <i class="bi bi-info-circle me-2"></i>
                    Os valores são apenas referenciais e dependem da complexidade de cada caso.
                    Consulte a clínica para um orçamento exato.
                </div>
            </div>

            <div class="mb-3 mt-3">
                <a href="<?= esc(url_path('paginas/servico.php')) ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i>
                    Voltar para Serviços
                </a>
            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>