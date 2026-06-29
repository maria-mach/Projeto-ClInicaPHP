<?php
require_once __DIR__ . '/../auth/verifica_admin.php';
require_once __DIR__ . '/../database/servicos/servicos_funcs.php';

$tituloPagina = 'Clínica Geral | Gerenciar Serviços';

$sucesso = filter_input(INPUT_GET, 'sucesso', FILTER_VALIDATE_INT);
$erro = filter_input(INPUT_GET, 'erro', FILTER_VALIDATE_INT);

$servicos = listar_todos_servicos();

require_once __DIR__ . '/../partials/header.php';
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold text-success">
                        <i class="fas fa-notes-medical me-2"></i>
                        Gerenciar Serviços
                    </h2>
                    <p class="text-muted">Visualize, edite, ative ou inative os serviços cadastrados.</p>
                </div>
            </div>

            <?php if ($sucesso === 1): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Serviço atualizado com sucesso.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($erro): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ocorreu um erro ao processar a ação.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <?php if (empty($servicos)): ?>

                        <div class="alert alert-info mb-0">
                            Nenhum serviço cadastrado.
                        </div>

                    <?php else: ?>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>ID</th>
                                        <th>Imagem</th>
                                        <th>Nome</th>
                                        <th>Categoria</th>
                                        <th>Preço</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($servicos as $servico): ?>
                                        <tr>
                                            <td><?= esc((string) $servico['id']) ?></td>

                                            <td>
                                                <img
                                                    src="<?= esc(url_path($servico['imagem'])) ?>"
                                                    alt="<?= esc($servico['nome']) ?>"
                                                    class="rounded shadow-sm"
                                                    style="width: 70px; height: 55px; object-fit: cover;">
                                            </td>

                                            <td><?= esc($servico['nome']) ?></td>

                                            <td><?= esc(nome_categoria($servico['categoria'])) ?></td>

                                            <td>
                                                R$ <?= number_format($servico['preco'], 2, ',', '.') ?>
                                            </td>

                                            <td>
                                                <?php if ($servico['status'] === 'ativo'): ?>
                                                    <span class="badge bg-success">Ativo</span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary">Inativo</span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <div class="d-flex gap-2 flex-wrap">

                                                    <a
                                                        href="<?= esc(url_path('admin/editar_servico.php?id=' . $servico['id'])) ?>"
                                                        class="btn btn-primary btn-sm">
                                                        Editar
                                                    </a>

                                                    <form
                                                        action="<?= esc(url_path('database/servicos/alterar_status_servico.php')) ?>"
                                                        method="POST">

                                                        <input
                                                            type="hidden"
                                                            name="id"
                                                            value="<?= esc((string) $servico['id']) ?>">

                                                        <?php if ($servico['status'] === 'ativo'): ?>
                                                            <input type="hidden" name="status" value="inativo">

                                                            <button type="submit" class="btn btn-warning btn-sm">
                                                                Inativar
                                                            </button>
                                                        <?php else: ?>
                                                            <input type="hidden" name="status" value="ativo">

                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                Ativar
                                                            </button>
                                                        <?php endif; ?>

                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    <?php endif; ?>

                </div>
            </div>

            <div class="mt-3">
                <a href="<?= esc(url_path('admin/cadastrar_servico.php')) ?>" class="btn btn-success">
                    Cadastrar novo serviço
                </a>
            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>