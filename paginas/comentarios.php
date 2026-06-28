<?php
$tituloPagina = 'Clínica Geral | Comentários';
require_once __DIR__ . '/../partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="fw-bold text-success"><i class="fas fa-comments me-2"></i>Comentários</h2>
                            <p class="text-muted">Bem-vindo à seção Comentários.</p>
                        </div>
                    </div>
                     <div class="container text-center mb-4">
                            <button id="btn_comentarios" class="btn btn-success btn-lg shadow-sm">
                                Carregar comentários
                            </button>
                    </div>
                    <div id="carrosel" style="display: none;">
                        <!-- Estrutura estática do carrossel -->
                        <div class="card card-outline card-dark mb-4">
                            <div class="card-body text-center">
                                <div id="carouselDepoimentos" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <!-- Os itens serão inseridos aqui pelo JS -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="container mt-4">
                        <div class="card card-outline card-dark mb-4">
                            <div class="card-header text-center">
                                <h3 class="card-title">O que nossos pacientes dizem</h3>
                            </div>
                            <div class="card-body text-center">
                                <div id="carouselDepoimentos" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <blockquote class="blockquote">
                                                <p>"Fui muito bem atendido, recomendo a clínica!"</p>
                                                <footer class="blockquote-footer">Carlos M.</footer>
                                            </blockquote>
                                        </div>
                                        <div class="carousel-item">
                                            <blockquote class="blockquote">
                                                <p>"Equipe atenciosa e profissional, me senti segura."</p>
                                                <footer class="blockquote-footer">Ana P.</footer>
                                            </blockquote>
                                        </div>
                                        <div class="carousel-item">
                                            <blockquote class="blockquote">
                                                <p>"Ótima estrutura e médicos excelentes."</p>
                                                <footer class="blockquote-footer">João R.</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselDepoimentos" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Anterior</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselDepoimentos" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Próximo</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
