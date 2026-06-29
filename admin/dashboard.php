<?php
require_once __DIR__ . '/../auth/verifica_admin.php';

$tituloPagina = 'Clínica Geral | Dashboard';

require_once __DIR__ . '/../partials/header.php';

$visitas = contar_acesso_restrito();
?>

<main class="app-main">
    <div class="app-content mt-4">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold text-success">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </h2>
                    <p class="text-muted">Acesso rápido às funções administrativas do sistema.</p>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">Painel administrativo</h5>

                    <div class="row g-4">

                        <div class="col-md-6">
                            <a href="<?= esc(url_path('admin/cadastrar_servico.php')) ?>" class="text-decoration-none">
                                <div class="card h-100 border-success shadow-sm">
                                    <div class="card-body d-flex align-items-center gap-3">
                                        <div class="bg-success bg-opacity-10 text-success rounded-circle p-3">
                                            <i class="fas fa-plus fs-3"></i>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold text-success mb-1">Cadastrar Serviço</h5>
                                            <p class="text-muted mb-0">Adicione novos serviços com preço e imagem.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="<?= esc(url_path('admin/comentarios.php')) ?>" class="text-decoration-none">
                                <div class="card h-100 border-primary shadow-sm">
                                    <div class="card-body d-flex align-items-center gap-3">
                                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3">
                                            <i class="fas fa-comments fs-3"></i>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold text-primary mb-1">Gerenciar Comentários</h5>
                                            <p class="text-muted mb-0">Aprove, responda ou arquive mensagens.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="<?= esc(url_path('admin/servicos.php')) ?>" class="text-decoration-none">
                                <div class="card h-100 border-info shadow-sm">
                                    <div class="card-body d-flex align-items-center gap-3">
                                        <div class="bg-info bg-opacity-10 text-info rounded-circle p-3">
                                            <i class="fas fa-notes-medical fs-3"></i>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold text-info mb-1">Gerenciar Serviços</h5>
                                            <p class="text-muted mb-0">Edite, ative ou inative serviços cadastrados.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="<?= esc(url_path('admin/unidades.php')) ?>" class="text-decoration-none">
                                <div class="card h-100 border-warning shadow-sm">
                                    <div class="card-body d-flex align-items-center gap-3">
                                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle p-3">
                                            <i class="fas fa-map-marker-alt fs-3"></i>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold text-warning mb-1">Gerenciar Unidades</h5>
                                            <p class="text-muted mb-0">Cadastre e edite endereços, horários e telefones.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?= esc(url_path('admin/agendamentos.php')) ?>" class="text-decoration-none">
                                <div class="card h-100 border-danger shadow-sm">
                                    <div class="card-body d-flex align-items-center gap-3">

                                        <div class="bg-danger bg-opacity-10 text-danger rounded-circle p-3">
                                            <i class="fas fa-calendar-check fs-3"></i>
                                        </div>

                                        <div>
                                            <h5 class="fw-bold text-danger mb-1">
                                                Gerenciar Agendamentos
                                            </h5>

                                            <p class="text-muted mb-0">
                                                Visualize, confirme, conclua ou cancele os agendamentos dos clientes.
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="alert alert-info mt-4 mb-0">
                        <i class="bi bi-info-circle me-2"></i>
                        Você acessou esta área administrativa
                        <strong><?= $visitas ?></strong>
                        vez(es) nesta sessão.
                    </div>

                </div>
            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>