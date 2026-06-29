<?php
$tituloPagina = 'Clínica Geral | Comentários';

require_once __DIR__ . '/../database/comentarios/comentarios_funcs.php';

$comentarios = listar_comentarios_ativos();

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
                    <div class="card card-outline card-dark mb-4">
                        <div class="card-body text-center">

                            <?php if (empty($comentarios)): ?>

                                <p class="text-muted mb-0">
                                    Ainda não há comentários cadastrados.
                                </p>

                            <?php else: ?>

                                <div id="carouselDepoimentos" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">

                                        <?php foreach ($comentarios as $indice => $comentario): ?>
                                            <div class="carousel-item <?= $indice === 0 ? 'active' : '' ?>"
                                                style="cursor:pointer;"
                                                onclick="bootstrap.Carousel.getOrCreateInstance(document.querySelector('#carouselDepoimentos')).next();">

                                                <blockquote class="blockquote">
                                                    <p>"<?= esc($comentario['mensagem']) ?>"</p>
                                                    <footer class="blockquote-footer mt-2">
                                                        <?= esc($comentario['nome']) ?>
                                                    </footer>
                                                </blockquote>

                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                        <div class="text-center mt-3">
                                            <small class="text-muted">
                                                Clique no comentário para visualizar o próximo depoimento.
                                            </small>
                                        </div>
                        
                                </div>

                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
