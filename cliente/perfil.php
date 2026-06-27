<?php
require_once __DIR__ . '/../auth/verifica_login.php';
require_once __DIR__ . '/../partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="fw-bold text-success"><i class="fas fa-user me-2"></i>Meu Perfil</h2>
                            <p class="text-muted">Bem-vindo, <?php echo esc($_SESSION['nome']); ?>.</p>
                        </div>
                    </div>
                    <div class="card shadow-sm border-0 w-100 mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Dados do cliente</h5>
                            <p class="card-text">Nome: <?php echo esc($_SESSION['nome']); ?></p>
                            <p class="card-text">Tipo: Cliente</p>
                            <a href="<?php echo esc(url_path('cliente/meus_agendamentos.php')); ?>" class="btn btn-primary">Ver Meus Agendamentos</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php require_once __DIR__ . '/../partials/footer.php';
