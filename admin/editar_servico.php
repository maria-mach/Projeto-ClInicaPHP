<?php
require_once __DIR__ . '/../auth/verifica_admin.php';
require_once __DIR__ . '/../database/servicos/servicos_funcs.php';

$tituloPagina = 'Clínica Geral | Editar Serviço';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    redirecionar(url_path('admin/servicos.php') . '?erro=1');
}

$servico = buscar_servico_por_id($id);

if (!$servico) {
    redirecionar(url_path('admin/servicos.php') . '?erro=1');
}

require_once __DIR__ . '/../partials/header.php';
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold text-success">
                        <i class="fas fa-edit me-2"></i>
                        Editar Serviço
                    </h2>
                    <p class="text-muted">Altere as informações do serviço cadastrado.</p>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <form
                        action="<?= esc(url_path('database/servicos/atualizar_servico.php')) ?>"
                        method="POST"
                        enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?= esc((string) $servico['id']) ?>">
                        <input type="hidden" name="imagem_atual" value="<?= esc($servico['imagem']) ?>">

                        <div class="mb-3">
                            <label class="form-label">Nome do Serviço</label>
                            <input
                                type="text"
                                name="nome"
                                class="form-control"
                                value="<?= esc($servico['nome']) ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Categoria</label>
                            <select name="categoria" class="form-select" required>
                                <option value="">Selecione...</option>
                                <option value="consulta" <?= $servico['categoria'] === 'consulta' ? 'selected' : '' ?>>Consulta</option>
                                <option value="exame" <?= $servico['categoria'] === 'exame' ? 'selected' : '' ?>>Exame</option>
                                <option value="cirurgia" <?= $servico['categoria'] === 'cirurgia' ? 'selected' : '' ?>>Cirurgia</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Preço</label>
                            <input
                                type="number"
                                name="preco"
                                class="form-control"
                                min="0.01"
                                step="0.01"
                                value="<?= esc((string) $servico['preco']) ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <textarea
                                name="descricao"
                                rows="5"
                                class="form-control"
                                required><?= esc($servico['descricao']) ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Imagem Atual</label>

                            <div class="mt-2">
                                <img
                                    src="<?= esc(url_path($servico['imagem'])) ?>"
                                    alt="<?= esc($servico['nome']) ?>"
                                    class="img-fluid rounded shadow"
                                    style="max-width: 250px;">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Nova Imagem (opcional)</label>
                            <input
                                type="file"
                                name="imagem"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp">
                        </div>

                        <button type="submit" class="btn btn-success">
                            Salvar Alterações
                        </button>

                        <a href="<?= esc(url_path('admin/servicos.php')) ?>" class="btn btn-outline-secondary">
                            Cancelar
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>