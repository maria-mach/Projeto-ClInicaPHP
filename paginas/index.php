<?php
$tituloPagina = 'Clínica Geral | Home';
require_once __DIR__ . '/../partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">

                <div class="container">

                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="fw-bold text-success"><i class="fas fa-home me-2"></i>Início</h2>
                            <p class="text-muted">Bem-vindo à Clínica Geral.</p>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 w-100 mb-4">
                        <div class="card-body">
                            <div id="carouselClinica" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                    <!-- Slide 1 -->
                                    <div class="carousel-item active">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                                <img src="<?= esc(url_path('assets/img/medicos-sorrindo.jpg')) ?>" class="w-100 rounded"
                                                    alt="Uma médica e um médico sorrindo ao lado um do outro.">
                                            </div>
                                            <div class="col-lg-6 text-center">
                                                <h3>Consultas Médicas</h3>
                                                <p>Atendimento humanizado em clínica geral, com foco na sua saúde e
                                                    bem-estar.</p>
                                                <a href="<?= esc(url_path('paginas/consultas.php')) ?>">
                                                    <button class="btn btn-primary">Agendar consulta</button>
                                                </a>
                                                <div class="mt-3">
                                                    <button class="btn btn-outline-dark me-2" type="button"
                                                        data-bs-target="#carouselClinica" data-bs-slide="prev">‹
                                                        Anterior</button>
                                                    <button class="btn btn-outline-dark" type="button"
                                                        data-bs-target="#carouselClinica" data-bs-slide="next">Próximo
                                                        ›</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Slide 2 -->
                                    <div class="carousel-item">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                                <img src="<?= esc(url_path('assets/img/exames.jpeg')) ?>" class="w-100 rounded"
                                                    alt="Doutor verificando radiografia.">
                                            </div>
                                            <div class="col-lg-6 text-center">
                                                <h3>Exames Preventivos</h3>
                                                <p>Realize seus exames com rapidez e confiança, cuidando da sua saúde
                                                    preventiva.</p>
                                                <a href="<?= esc(url_path('paginas/exames.php')) ?>">
                                                    <button class="btn btn-success">Saiba mais</button>
                                                </a>
                                                <div class="mt-3">
                                                    <button class="btn btn-outline-dark me-2" type="button"
                                                        data-bs-target="#carouselClinica" data-bs-slide="prev">‹
                                                        Anterior</button>
                                                    <button class="btn btn-outline-dark" type="button"
                                                        data-bs-target="#carouselClinica" data-bs-slide="next">Próximo
                                                        ›</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Slide 3 -->
                                    <div class="carousel-item">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                                <img src="<?= esc(url_path('assets/img/familia-hospital.avif')) ?>" class="w-100 rounded"
                                                    alt="Familia de uma idosa ao lado dela na cama do hospital.">
                                            </div>
                                            <div class="col-lg-6 text-center">
                                                <h3>Saúde da Família</h3>
                                                <p>Cuidamos de todas as idades, oferecendo acompanhamento completo para
                                                    sua família.</p>
                                                <a href="<?= esc(url_path('paginas/consultas.php')) ?>">
                                                    <button class="btn btn-danger">Explorar serviços</button>
                                                </a>
                                                <div class="mt-3">
                                                    <button class="btn btn-outline-dark me-2" type="button"
                                                        data-bs-target="#carouselClinica" data-bs-slide="prev">‹
                                                        Anterior</button>
                                                    <button class="btn btn-outline-dark" type="button"
                                                        data-bs-target="#carouselClinica" data-bs-slide="next">Próximo
                                                        ›</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.container -->


                <div class="container">
                    <div class="row mt-5 mb-4 px-3">
                        <div class="col-12 d-flex justify-content-between border-top pt-4">
                            <div></div>
                            <a href="<?= esc(url_path('paginas/empresa.php')) ?>" class="text-decoration-none text-primary fw-bold">Empresa</a>
                        </div>
                    </div>
                </div>
            </div> <!-- /app-content -->
        </main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
