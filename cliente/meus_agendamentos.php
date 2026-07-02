<?php
require_once __DIR__ . '/../auth/verifica_cliente.php';
require_once __DIR__ . '/../database/agendamentos/agendamentos_funcs.php';
require_once __DIR__ . '/../database/servicos/servicos_funcs.php';

$tituloPagina = 'Clínica Geral | Meus Agendamentos';

$sucesso = filter_input(INPUT_GET, 'sucesso', FILTER_VALIDATE_INT);
$cancelado = filter_input(INPUT_GET, 'cancelado', FILTER_VALIDATE_INT);
$erro = filter_input(INPUT_GET, 'erro', FILTER_VALIDATE_INT);

$usuario = usuario();
$agendamentos = listar_agendamentos_por_usuario((int) $usuario['id']);

require_once __DIR__ . '/../partials/header.php';
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container">

            <h2 class="fw-bold text-success mb-3">
                <i class="bi bi-calendar-check me-2"></i>
                Meus Agendamentos
            </h2>
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">

                <p class="text-muted mb-0">
                    Consulte seus agendamentos e realize novos agendamentos.
                </p>

                <a href="<?= esc(url_path('paginas/detalhes.php')) ?>" class="btn btn-success">
                    <i class="bi bi-plus-circle me-2"></i>
                    Novo Agendamento
                </a>

            </div>

            <?php if ($sucesso === 1): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    Agendamento realizado com sucesso!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($cancelado === 1): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    Agendamento cancelado com sucesso!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($erro): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?php if ($erro === 2): ?>
                        Não é possível agendar em uma data anterior à data atual.
                    <?php elseif ($erro === 3): ?>
                        Este horário não está mais disponível. Escolha outro horário.
                    <?php elseif ($erro === 6): ?>
                        Esta unidade não atende nesta data.
                    <?php elseif ($erro === 7): ?>
                        Este horário está fora do funcionamento da unidade.
                    <?php else: ?>
                        Não foi possível realizar a operação. Tente novamente.
                    <?php endif; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <?php if (empty($agendamentos)): ?>

                        <div class="alert alert-info mb-0">
                            Você ainda não possui agendamentos.
                        </div>

                    <?php else: ?>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-success">
                                    <tr>
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
                                                <?php if (
                                                    $agendamento['status'] === 'confirmado' ||
                                                    $agendamento['status'] === 'pendente'
                                                ): ?>

                                                    <a
                                                        href="<?= esc(url_path('database/agendamentos/cancelar_agendamento.php?id=' . $agendamento['id'])) ?>"
                                                        class="btn btn-outline-danger btn-sm"
                                                        onclick="return confirm('Deseja realmente cancelar este agendamento?');">

                                                        <i class="bi bi-x-circle me-1"></i>
                                                        Cancelar

                                                    </a>

                                                <?php else: ?>

                                                    <span class="text-muted">—</span>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
