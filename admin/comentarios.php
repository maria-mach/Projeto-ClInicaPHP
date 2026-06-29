<?php
$tituloPagina = 'Clínica Geral | Gerenciar Comentários';

require_once __DIR__ . '/../auth/funcs.php';
require_once __DIR__ . '/../database/conexao.php';

iniciar_sessao();

if (!is_admin()) {
    redirecionar(url_path('login.php'));
}

$sucesso = filter_input(INPUT_GET, 'sucesso', FILTER_VALIDATE_INT);
$erro = filter_input(INPUT_GET, 'erro', FILTER_VALIDATE_INT);

$sql = "SELECT *
        FROM comentarios
        ORDER BY criado_em DESC";

$stmt = $conexao->query($sql);
$comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once __DIR__ . '/../partials/header.php';
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold text-success">
                        <i class="fas fa-comments me-2"></i>
                        Gerenciar Comentários
                    </h2>
                </div>
            </div>

            <?php if ($sucesso === 1): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    Status atualizado com sucesso.
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($erro): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    Ocorreu um erro ao atualizar o comentário.
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-success">
                                <tr>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Mensagem</th>
                                    <th>Status</th>
                                    <th width="320">Ações</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($comentarios as $comentario): ?>

                                    <tr>

                                        <td><?= esc($comentario['nome']) ?></td>

                                        <td><?= esc($comentario['tipo']) ?></td>

                                        <td><?= esc($comentario['mensagem']) ?></td>

                                        <td>

                                            <?php
                                            $cor = 'secondary';

                                            switch ($comentario['status']) {
                                                case 'pendente':
                                                    $cor = 'warning';
                                                    break;

                                                case 'aprovado':
                                                    $cor = 'success';
                                                    break;

                                                case 'respondido':
                                                    $cor = 'primary';
                                                    break;

                                                case 'arquivado':
                                                    $cor = 'dark';
                                                    break;
                                            }
                                            ?>

                                            <span class="badge bg-<?= $cor ?>">
                                                <?= esc($comentario['status']) ?>
                                            </span>

                                        </td>

                                        <td>

                                            <div class="d-flex gap-2 flex-wrap">

                                                <form action="<?= esc(url_path('database/comentarios/alterar_status_comentario.php')) ?>" method="POST">

                                                    <input type="hidden" name="id" value="<?= $comentario['id'] ?>">
                                                    <input type="hidden" name="status" value="aprovado">

                                                    <button class="btn btn-success btn-sm">
                                                        Aprovar
                                                    </button>

                                                </form>

                                                <form action="<?= esc(url_path('database/comentarios/alterar_status_comentario.php')) ?>" method="POST">

                                                    <input type="hidden" name="id" value="<?= $comentario['id'] ?>">
                                                    <input type="hidden" name="status" value="respondido">

                                                    <button class="btn btn-primary btn-sm">
                                                        Responder
                                                    </button>

                                                </form>

                                                <form action="<?= esc(url_path('database/comentarios/alterar_status_comentario.php')) ?>" method="POST">

                                                    <input type="hidden" name="id" value="<?= $comentario['id'] ?>">
                                                    <input type="hidden" name="status" value="arquivado">

                                                    <button class="btn btn-warning btn-sm">
                                                        Arquivar
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>