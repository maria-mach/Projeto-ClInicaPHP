<?php
$tituloPagina = 'Clínica Geral | Redes Sociais';
require_once __DIR__ . '/../partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container">

                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="fw-bold text-success"><i class="fas fa-share-alt me-2"></i>Redes Sociais</h2>
                            <p class="text-muted">Bem-vindo à seção Redes Sociais.</p>
                        </div>
                    </div>


                    <div class="row g-4 justify-content-center text-center">
                        <div class="col-md-3 col-6">
                            <a href="#" class="text-decoration-none">
                                <div class="card shadow-sm border-0 hover-shadow h-100">
                                    <div class="card-body p-4">
                                        <i class="bi bi-instagram text-danger" style="font-size: 3rem;"></i>
                                        <h5 class="mt-3 text-dark">Instagram</h5>
                                        <p class="text-muted small mb-0">@clinicageral</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="#" class="text-decoration-none">
                                <div class="card shadow-sm border-0 hover-shadow h-100">
                                    <div class="card-body p-4">
                                        <i class="bi bi-facebook text-primary" style="font-size: 3rem;"></i>
                                        <h5 class="mt-3 text-dark">Facebook</h5>
                                        <p class="text-muted small mb-0">/clinicageral</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="#" class="text-decoration-none">
                                <div class="card shadow-sm border-0 hover-shadow h-100">
                                    <div class="card-body p-4">
                                        <i class="bi bi-linkedin text-info" style="font-size: 3rem;"></i>
                                        <h5 class="mt-3 text-dark">LinkedIn</h5>
                                        <p class="text-muted small mb-0">Clínica Geral S.A.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="#" class="text-decoration-none">
                                <div class="card shadow-sm border-0 hover-shadow h-100">
                                    <div class="card-body p-4">
                                        <i class="bi bi-youtube text-danger" style="font-size: 3rem;"></i>
                                        <h5 class="mt-3 text-dark">YouTube</h5>
                                        <p class="text-muted small mb-0">Canal Clínica Geral</p>
                                    </div>
                                </div>
                            </a>
                        </div> <!-- /.col-md-3 (YouTube) -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div> <!-- /.app-content -->

            <div class="container">
                <div class="row mt-5 mb-4 px-3">
                    <div class="col-12 d-flex justify-content-between border-top pt-4">
                        <a href="<?= esc(url_path('paginas/local.php')) ?>" class="text-decoration-none text-secondary">Local</a>
                        <a href="<?= esc(url_path('paginas/comentarios.php')) ?>" class="text-decoration-none text-primary fw-bold">Comentários</a>
                    </div>
                </div>
            </div> <!-- /.container (nav area) -->
        </main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
