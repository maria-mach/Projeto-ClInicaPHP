<?php
require_once __DIR__ . '/../auth/verifica_login.php';
require_once __DIR__ . '/../database/usuarios/usuario_funcs.php';

$usuarioPerfil = buscar_usuario_por_id((int) $_SESSION['usuario_id']);

if (!$usuarioPerfil) {
    redirecionar(url_path('auth/logout.php'));
}

$visitas = 0;

if ($_SESSION['tipo'] === 'cliente') {
    $visitas = contar_acesso_restrito();
}

require_once __DIR__ . '/../partials/header.php';
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold text-success">
                        <i class="fas fa-user me-2"></i>Meu Perfil
                    </h2>
                    <p class="text-muted">
                        Bem-vindo, <?= esc($usuarioPerfil['nome']); ?>.
                    </p>
                </div>
            </div>

            <div class="card shadow-sm border-0 w-100 mb-4">
                <div class="card-body">

                    <?php if (isset($_GET['sucesso'])): ?>
                        <div class="alert alert-success">
                            Dados atualizados com sucesso.
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_GET['erro'])): ?>
                        <div class="alert alert-danger">
                            <?php if ((int) $_GET['erro'] === 3): ?>
                                Não foi possível excluir sua conta. Tente novamente.
                            <?php else: ?>
                                Erro ao atualizar os dados.
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($_SESSION['tipo'] === 'cliente'): ?>
                        <p class="card-text">
                            Acessos à área restrita nesta sessão:
                            <strong><?= $visitas ?></strong>
                        </p>
                    <?php endif; ?>

                    <h5 class="fw-bold mb-3">Dados do usuário</h5>
                    
                    <form action="<?= esc(url_path('database/usuarios/atualizar_usuario.php')) ?>" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input
                                type="text"
                                name="nome"
                                class="form-control"
                                value="<?= esc($usuarioPerfil['nome']); ?>"
                                required>
                        </div>
                        <div class="mb-3 text-center">
                            <img src="<?= esc(foto_usuario_url($usuarioPerfil['foto'] ?? null)) ?>"
                                class="rounded-circle shadow mb-2"
                                width="120"
                                height="120"
                                alt="Foto de perfil">

                            <input
                                type="file"
                                name="foto"
                                class="form-control mt-2"
                                accept="image/jpeg,image/png,image/webp">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">CPF</label>
                            <input
                                type="text"
                                name="cpf"
                                class="form-control"
                                value="<?= esc($usuarioPerfil['cpf'] ?? ''); ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telefone</label>
                            <input
                                type="text"
                                name="telefone"
                                class="form-control"
                                value="<?= esc($usuarioPerfil['telefone'] ?? ''); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="<?= esc($usuarioPerfil['email']); ?>"
                                required>
                        </div>

                        <hr>

                        <h5 class="fw-bold mb-3">Endereço</h5>

                        <div class="mb-3">
                            <label class="form-label">CEP</label>
                            <input
                                type="text"
                                name="cep"
                                class="form-control"
                                value="<?= esc($usuarioPerfil['cep'] ?? ''); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Endereço</label>
                            <input
                                type="text"
                                name="endereco"
                                class="form-control"
                                value="<?= esc($usuarioPerfil['endereco'] ?? ''); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Número</label>
                            <input
                                type="text"
                                name="numero"
                                class="form-control"
                                value="<?= esc($usuarioPerfil['numero'] ?? ''); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bairro</label>
                            <input
                                type="text"
                                name="bairro"
                                class="form-control"
                                value="<?= esc($usuarioPerfil['bairro'] ?? ''); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cidade</label>
                            <input
                                type="text"
                                name="cidade"
                                class="form-control"
                                value="<?= esc($usuarioPerfil['cidade'] ?? ''); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <input
                                type="text"
                                name="estado"
                                class="form-control"
                                maxlength="2"
                                value="<?= esc($usuarioPerfil['estado'] ?? ''); ?>">
                        </div>

                        <p class="card-text">
                            Tipo: <?= esc($usuarioPerfil['tipo']); ?>
                        </p>

                        <button type="submit" class="btn btn-success">
                            Salvar Alterações
                        </button>

                        <a href="<?= esc(url_path('database/usuarios/excluir_usuario.php')) ?>"
                        class="btn btn-danger"
                        onclick="return confirm('Deseja realmente excluir sua conta?');">
                            Excluir Conta
                        </a>

                        <?php if ($_SESSION['tipo'] === 'cliente'): ?>
                            <a href="<?= esc(url_path('cliente/meus_agendamentos.php')); ?>" class="btn btn-primary">
                                Ver Meus Agendamentos
                            </a>
                        <?php endif; ?>

                    </form>

                </div>
            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
