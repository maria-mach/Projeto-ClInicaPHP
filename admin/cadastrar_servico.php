<?php
require_once __DIR__ . '/../auth/verifica_admin.php';

$tituloPagina = 'Clínica Geral | Cadastrar Serviço';
require_once __DIR__ . '/../partials/header.php';
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold text-success">
                        <i class="fas fa-notes-medical me-2"></i>
                        Cadastro de Serviço
                    </h2>

                    <p class="text-muted">
                        Cadastre um novo serviço da clínica.
                    </p>
                </div>
            </div>

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <form
                        action="<?= esc(url_path('projeto-upload/salvar.php')) ?>"
                        method="POST"
                        enctype="multipart/form-data">

                        <div class="mb-3">
                            <label class="form-label">Nome do Serviço</label>

                            <input
                                type="text"
                                name="nome"
                                class="form-control"
                                placeholder="Ex.: Consulta Cardiológica"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Preço</label>

                            <input
                                type="number"
                                name="preco"
                                class="form-control"
                                min="0.01"
                                step="0.01"
                                placeholder="0,00"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descrição</label>

                            <textarea
                                name="descricao"
                                rows="5"
                                class="form-control"
                                placeholder="Descrição do serviço"
                                required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Imagem do Serviço</label>

                            <input
                                type="file"
                                name="imagem"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp"
                                required>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-success">
                            Cadastrar Serviço
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>