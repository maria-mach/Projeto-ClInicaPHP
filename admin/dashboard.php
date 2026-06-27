<?php
require_once __DIR__ . '/../auth/verifica_admin.php';
require_once __DIR__ . '/../partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="fw-bold text-success"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h2>
                            <p class="text-muted">Acesso restrito a administradores.</p>
                        </div>
                    </div>
                    <div class="card shadow-sm border-0 w-100 mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Painel administrativo</h5>
                            <p class="card-text">Gerencie clientes, agendamentos e conteúdo do sistema.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php require_once __DIR__ . '/../partials/footer.php';
