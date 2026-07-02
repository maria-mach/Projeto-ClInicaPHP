<?php
require_once __DIR__ . '/../auth/verifica_admin.php';

$tituloPagina = 'Clínica Geral | Cadastrar Unidade';

$sucesso = filter_input(INPUT_GET, 'sucesso', FILTER_VALIDATE_INT);
$erro = filter_input(INPUT_GET, 'erro', FILTER_VALIDATE_INT);

require_once __DIR__ . '/../partials/header.php';
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container">

            <h2 class="fw-bold text-success mb-3">
                <i class="fas fa-map-marker-alt me-2"></i>
                Cadastrar Unidade
            </h2>

            <?php if ($sucesso === 1): ?>
                <div class="alert alert-success">Unidade cadastrada com sucesso.</div>
            <?php endif; ?>

            <?php if ($erro): ?>
                <div class="alert alert-danger">Erro ao cadastrar unidade.</div>
            <?php endif; ?>

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <form action="<?= esc(url_path('database/unidades/cadastrar_unidade.php')) ?>" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Nome da Unidade</label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Endereço</label>
                            <input type="text" name="endereco" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telefone</label>
                            <input type="text" name="telefone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Dias de Funcionamento</label>
                            <input type="text" name="dias_funcionamento" class="form-control" value="1,2,3,4,5" placeholder="Ex.: 1,2,3,4,5">
                            <div class="form-text">Use números separados por vírgula: 1=Seg, 2=Ter, ..., 7=Dom.</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hora de Início</label>
                                <input type="time" name="hora_inicio" class="form-control" value="08:00">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hora de Fim</label>
                                <input type="time" name="hora_fim" class="form-control" value="17:00">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">
                            Cadastrar Unidade
                        </button>

                        <a href="<?= esc(url_path('admin/unidades.php')) ?>" class="btn btn-outline-secondary">
                            Voltar
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
