<?php
require_once __DIR__ . '/../auth/verifica_admin.php';
require_once __DIR__ . '/../database/unidades/unidades_funcs.php';

$tituloPagina = 'Clínica Geral | Editar Unidade';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    redirecionar(url_path('admin/unidades.php') . '?erro=1');
}

$unidade = buscar_unidade_por_id($id);

if (!$unidade) {
    redirecionar(url_path('admin/unidades.php') . '?erro=1');
}

require_once __DIR__ . '/../partials/header.php';
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container">

            <h2 class="fw-bold text-success mb-3">
                <i class="fas fa-edit me-2"></i>
                Editar Unidade
            </h2>

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <form action="<?= esc(url_path('database/unidades/atualizar_unidade.php')) ?>" method="POST">

                        <input type="hidden" name="id" value="<?= esc((string) $unidade['id']) ?>">

                        <div class="mb-3">
                            <label class="form-label">Nome da Unidade</label>
                            <input
                                type="text"
                                name="nome"
                                class="form-control"
                                value="<?= esc($unidade['nome']) ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Endereço</label>
                            <input
                                type="text"
                                name="endereco"
                                class="form-control"
                                value="<?= esc($unidade['endereco']) ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telefone</label>
                            <input
                                type="text"
                                name="telefone"
                                class="form-control"
                                value="<?= esc($unidade['telefone']) ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Horário de Atendimento</label>
                            <input
                                type="text"
                                name="horario"
                                class="form-control"
                                value="<?= esc($unidade['horario']) ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Dias de Funcionamento</label>
                            <input
                                type="text"
                                name="dias_funcionamento"
                                class="form-control"
                                value="<?= esc((string) ($unidade['dias_funcionamento'] ?? '1,2,3,4,5')) ?>"
                                placeholder="Ex.: 1,2,3,4,5">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hora de Início</label>
                                <input
                                    type="time"
                                    name="hora_inicio"
                                    class="form-control"
                                    value="<?= esc(substr((string) ($unidade['hora_inicio'] ?? '08:00:00'), 0, 5)) ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hora de Fim</label>
                                <input
                                    type="time"
                                    name="hora_fim"
                                    class="form-control"
                                    value="<?= esc(substr((string) ($unidade['hora_fim'] ?? '17:00:00'), 0, 5)) ?>">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">
                            Salvar Alterações
                        </button>

                        <a href="<?= esc(url_path('admin/unidades.php')) ?>" class="btn btn-outline-secondary">
                            Cancelar
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>