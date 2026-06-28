<?php
$tituloPagina = 'Clínica Geral | Serviços';
require_once __DIR__ . '/../partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container">

                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="fw-bold text-success"><i class="fas fa-box-open me-2"></i>Produto ou Serviço</h2>
                            <p class="text-muted">Bem-vindo à seção Produto ou Serviço.</p>
                        </div>
                    </div>

                    <!-- Container dos cards -->
                        <!-- /.col -->
                        <div class="row g-4 mb-4 justify-content-center mt-4">
                            <div class="col-md-3">
                                <div class="cdhover card card-outline card-success h-100">
                                    <div class="card-header">
                                        <h3 class="card-title">Consultas</h3>
                                        <div class="card-tools">
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body text-center">
                                        <div class="border rounded p-3 mb-3 d-inline-block shadow-sm">
                                            <i class="fas fa-heartbeat fs-1 text-primary"></i>
                                        </div>
                                        <p>Agende sua consulta com facilidade e tenha acompanhamento médico sempre à
                                            disposição.</p>
                                        <a href="<?= esc(url_path('paginas/detalhes.php#sec-consultas')) ?>" class="btn btn-outline-success btn-sm mt-2">Saiba mais</a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-md-3">
                                <div class="cdhover card card-outline card-success h-100">
                                    <div class="card-header">
                                        <h3 class="card-title">Exames</h3>
                                        <div class="card-tools">
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body text-center">
                                        <div class="border rounded p-3 mb-3 d-inline-block shadow-sm">
                                            <i class="fas fa-hospital fs-1 text-success"></i>
                                        </div>
                                        <p>Resultados rápidos e precisos para cuidar da sua saúde e dos seus familiares com confiança.</p>
                                        <a href="<?= esc(url_path('paginas/detalhes.php#sec-exames')) ?>" class="btn btn-outline-success btn-sm mt-2">Saiba mais</a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-md-3">
                                <div class="cdhover card card-outline card-success h-100">
                                    <div class="card-header">
                                        <h3 class="card-title">Cirurgias</h3>
                                        <div class="card-tools">
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body text-center">
                                        <div class="border rounded p-3 mb-3 d-inline-block shadow-sm">
                                            <i class="fas fa-user-check fs-1"></i>
                                        </div>
                                        <p>Estrutura moderna e equipe especializada para garantir segurança em cada
                                            procedimento</p>
                                        <a href="<?= esc(url_path('paginas/detalhes.php#sec-cirurgias')) ?>" class="btn btn-outline-success btn-sm mt-2">Saiba mais</a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.card -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div> <!-- /.app-content -->
        </main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
