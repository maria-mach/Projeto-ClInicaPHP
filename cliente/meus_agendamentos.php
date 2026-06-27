<?php
require_once __DIR__ . '/../auth/verifica_login.php';
require_once __DIR__ . '/../partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="fw-bold text-success"><i class="fas fa-calendar-check me-2"></i>Meus Agendamentos</h2>
                            <p class="text-muted">Esta área é acessível apenas para clientes logados.</p>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 w-100 mb-4">
                        <div class="card-body">
                            <p class="card-text">Aqui estarão os seus agendamentos cadastrados.</p>
                            <p class="text-muted">Caso não existam agendamentos, faça um agendamento em Consultas ou Exames.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php require_once __DIR__ . '/../partials/footer.php';
