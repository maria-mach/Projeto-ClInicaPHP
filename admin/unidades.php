<?php
require_once __DIR__ . '/../auth/verifica_admin.php';
require_once __DIR__ . '/../database/unidades/unidades_funcs.php';

$tituloPagina = 'Clínica Geral | Gerenciar Unidades';

$sucesso = filter_input(INPUT_GET, 'sucesso', FILTER_VALIDATE_INT);
$erro = filter_input(INPUT_GET, 'erro', FILTER_VALIDATE_INT);

$unidades = listar_todas_unidades();

require_once __DIR__ . '/../partials/header.php';
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold text-success">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Gerenciar Unidades
                    </h2>

                    <p class="text-muted">
                        Visualize, edite, ative ou inative as unidades cadastradas.
                    </p>
                </div>
            </div>

            <?php if ($sucesso === 1): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    Operação realizada com sucesso.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($erro): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    Ocorreu um erro ao processar a operação.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <?php if (empty($unidades)): ?>

                        <div class="alert alert-info mb-0">
                            Nenhuma unidade cadastrada.
                        </div>

                    <?php else: ?>

                        <div class="table-responsive">

                            <table class="table table-hover align-middle">

                                <thead class="table-success">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Endereço</th>
                                        <th>Telefone</th>
                                        <th>Horário</th>
                                        <th>Funcionamento</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach ($unidades as $unidade): ?>

                                        <tr>

                                            <td><?= esc((string)$unidade['id']) ?></td>

                                            <td><?= esc($unidade['nome']) ?></td>

                                            <td><?= esc($unidade['endereco']) ?></td>

                                            <td><?= esc($unidade['telefone']) ?></td>

                                            <td><?= esc($unidade['horario']) ?></td>

                                            <td>
                                                <?= esc((string) ($unidade['dias_funcionamento'] ?? '')) ?><br>
                                                <?= esc(substr((string) ($unidade['hora_inicio'] ?? ''), 0, 5) . ' às ' . substr((string) ($unidade['hora_fim'] ?? ''), 0, 5)) ?>
                                            </td>

                                            <td>

                                                <?php if ($unidade['status'] === 'ativo'): ?>

                                                    <span class="badge bg-success">
                                                        Ativo
                                                    </span>

                                                <?php else: ?>

                                                    <span class="badge bg-secondary">
                                                        Inativo
                                                    </span>

                                                <?php endif; ?>

                                            </td>

                                            <td>

                                                <div class="d-flex gap-2 flex-wrap">

                                                    <a
                                                        href="<?= esc(url_path('admin/editar_unidade.php?id=' . $unidade['id'])) ?>"
                                                        class="btn btn-primary btn-sm">

                                                        Editar

                                                    </a>

                                                    <form
                                                        action="<?= esc(url_path('database/unidades/alterar_status_unidade.php')) ?>"
                                                        method="POST">

                                                        <input
                                                            type="hidden"
                                                            name="id"
                                                            value="<?= esc((string)$unidade['id']) ?>">

                                                        <?php if ($unidade['status'] === 'ativo'): ?>

                                                            <input
                                                                type="hidden"
                                                                name="status"
                                                                value="inativo">

                                                            <button
                                                                class="btn btn-warning btn-sm"
                                                                type="submit">

                                                                Inativar

                                                            </button>

                                                        <?php else: ?>

                                                            <input
                                                                type="hidden"
                                                                name="status"
                                                                value="ativo">

                                                            <button
                                                                class="btn btn-success btn-sm"
                                                                type="submit">

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

                <a
                    href="<?= esc(url_path('admin/cadastrar_unidade.php')) ?>"
                    class="btn btn-success">

                    Cadastrar Nova Unidade

                </a>

            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>