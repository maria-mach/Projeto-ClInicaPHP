<?php
require_once __DIR__ . '/../auth/verifica_admin.php';
require_once __DIR__ . '/../database/agendamentos/agendamentos_funcs.php';
require_once __DIR__ . '/../database/servicos/servicos_funcs.php';

$tituloPagina = 'Clínica Geral | Gerenciar Agendamentos';

$sucesso = filter_input(INPUT_GET, 'sucesso', FILTER_VALIDATE_INT);
$erro = filter_input(INPUT_GET, 'erro', FILTER_VALIDATE_INT);

$agendamentos = listar_todos_agendamentos();

require_once __DIR__ . '/../partials/header.php';
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container">

            <h2 class="fw-bold text-success mb-3">
                <i class="bi bi-calendar-check me-2"></i>
                Gerenciar Agendamentos
            </h2>

            <?php if ($sucesso === 1): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    Status do agendamento atualizado com sucesso!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($erro): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    Não foi possível atualizar o agendamento.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <?php if (empty($agendamentos)): ?>

                        <div class="alert alert-info mb-0">
                            Nenhum agendamento cadastrado.
                        </div>

                    <?php else: ?>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>Cliente</th>
                                        <th>E-mail</th>
                                        <th>Serviço</th>
                                        <th>Categoria</th>
                                        <th>Unidade</th>
                                        <th>Data</th>
                                        <th>Horário</th>
                                        <th>Status</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($agendamentos as $agendamento): ?>
                                        <tr>
                                            <td><?= esc($agendamento['cliente']) ?></td>

                                            <td><?= esc($agendamento['email_cliente']) ?></td>

                                            <td><?= esc($agendamento['servico']) ?></td>

                                            <td><?= esc(nome_categoria($agendamento['categoria'])) ?></td>

                                            <td><?= esc($agendamento['unidade']) ?></td>

                                            <td><?= date('d/m/Y', strtotime($agendamento['data_agendamento'])) ?></td>

                                            <td><?= esc($agendamento['horario']) ?></td>

                                            <td>
                                                <?php if ($agendamento['status'] === 'confirmado'): ?>
                                                    <span class="badge bg-success">Confirmado</span>
                                                <?php elseif ($agendamento['status'] === 'cancelado'): ?>
                                                    <span class="badge bg-danger">Cancelado</span>
                                                <?php elseif ($agendamento['status'] === 'concluido'): ?>
                                                    <span class="badge bg-secondary">Concluído</span>
                                                <?php else: ?>
                                                    <span class="badge bg-warning text-dark">Pendente</span>
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center">
                                                <div class="d-flex gap-2 justify-content-center flex-wrap">

                                                    <?php if ($agendamento['status'] === 'pendente'): ?>
                                                        <a
                                                            href="<?= esc(url_path('database/agendamentos/alterar_status_agendamento.php?id=' . $agendamento['id'] . '&status=confirmado')) ?>"
                                                            class="btn btn-success btn-sm">
                                                            Confirmar
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if (
                                                        $agendamento['status'] === 'pendente' ||
                                                        $agendamento['status'] === 'confirmado'
                                                    ): ?>

                                                        <a
                                                            href="<?= esc(url_path('database/agendamentos/alterar_status_agendamento.php?id=' . $agendamento['id'] . '&status=concluido')) ?>"
                                                            class="btn btn-secondary btn-sm"
                                                            onclick="return confirm('Deseja marcar este agendamento como concluído?');">
                                                            Concluir
                                                        </a>

                                                        <a
                                                            href="<?= esc(url_path('database/agendamentos/alterar_status_agendamento.php?id=' . $agendamento['id'] . '&status=cancelado')) ?>"
                                                            class="btn btn-outline-danger btn-sm"
                                                            onclick="return confirm('Deseja cancelar este agendamento?');">
                                                            Cancelar
                                                        </a>

                                                    <?php else: ?>

                                                        <span class="text-muted">—</span>

                                                    <?php endif; ?>

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
                <a href="<?= esc(url_path('admin/dashboard.php')) ?>" class="btn btn-outline-secondary">
                    Voltar ao Dashboard
                </a>
            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>