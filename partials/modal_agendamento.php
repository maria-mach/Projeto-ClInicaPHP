<?php
require_once __DIR__ . '/../database/unidades/unidades_funcs.php';

$unidades = listar_unidades_ativas();
?>

<div class="modal fade" id="modalAgendamento" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">
                    <i class="bi bi-calendar-check me-2"></i>
                    Agendamento
                </h5>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <!-- Visitante -->
            <?php if (!usuario_logado()): ?>

                <div class="modal-body">
                    <div class="alert alert-warning mb-0">
                        Para realizar um agendamento é necessário entrar em sua conta ou criar um cadastro.
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="<?= esc(url_path('login.php')) ?>" class="btn btn-success">
                        Fazer Login
                    </a>

                    <a href="<?= esc(url_path('cadastro.php')) ?>" class="btn btn-outline-success">
                        Criar Conta
                    </a>
                </div>

            <!-- Administrador -->
            <?php elseif (!is_cliente()): ?>

                <div class="modal-body">
                    <div class="alert alert-info mb-0">
                        Apenas usuários do tipo <strong>Cliente</strong> podem realizar agendamentos.
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Fechar
                    </button>
                </div>

            <!-- Cliente -->
            <?php else: ?>

                <form action="<?= esc(url_path('database/agendamentos/cadastrar_agendamento.php')) ?>" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="servico_id" id="servico_id">

                        <div class="mb-3">
                            <label class="form-label">Serviço</label>
                            <input
                                type="text"
                                id="servico_nome"
                                class="form-control"
                                readonly>
                        </div>

                        <div class="mb-3">
                            <label for="unidade_id" class="form-label">Unidade</label>

                            <select
                                id="unidade_id"
                                name="unidade_id"
                                class="form-select"
                                required>

                                <option value="">Selecione...</option>

                                <?php foreach ($unidades as $unidade): ?>
                                    <option value="<?= esc((string) $unidade['id']) ?>">
                                        <?= esc($unidade['nome']) ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="data_agendamento" class="form-label">Data</label>

                            <input
                                type="date"
                                id="data_agendamento"
                                name="data_agendamento"
                                class="form-control"
                                min="<?= date('Y-m-d') ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="horario" class="form-label">
                                Horário disponível
                            </label>

                            <select
                                id="horario"
                                name="horario"
                                class="form-select"
                                required>

                                <option value="">
                                    Selecione uma unidade e uma data primeiro
                                </option>

                            </select>

                            <div id="aviso_horario" class="form-text text-danger mt-1"></div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                            Cancelar
                        </button>

                        <button
                            type="submit"
                            class="btn btn-success">
                            Confirmar Agendamento
                        </button>
                    </div>

                </form>

            <?php endif; ?>

        </div>
    </div>
</div>