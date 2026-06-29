<?php
$tituloPagina = 'Clínica Geral | Clientes';

require_once __DIR__ . '/../database/usuarios/usuario_funcs.php';

$clientes = listar_clientes_destaque();

require_once __DIR__ . '/../partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="fw-bold text-success"><i class="fas fa-users me-2"></i>Clientes</h2>
                            <p class="text-muted">Bem-vindo à seção Clientes.</p>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body p-5">
                            <div class="text-center mb-5">
                                <h4 class="text-primary mb-3">Nossos Pacientes</h4>
                                <p class="text-muted">Conheça algumas histórias de quem confia na Clínica Geral para
                                    cuidar de sua saúde.</p>
                            </div>
                            <div class="row text-center g-4 mb-5">
                                <?php foreach ($clientes as $cliente): ?>
                                <div class="col-md-4">

                                    <img src="<?= esc(foto_usuario_url($cliente['foto'] ?? null)) ?>"
                                        class="rounded-circle mb-3 shadow"
                                        width="100"
                                        height="100"
                                        style="object-fit: cover;"
                                        alt="<?= esc($cliente['nome']) ?>">

                                        <h5><?= esc($cliente['nome']) ?></h5>

                                        <p class="text-muted small">
                                            Paciente da Clínica Geral
                                        </p>

                                    </div>
                                <?php endforeach; ?>

                            </div>
                            <div class="text-center mt-4 bg-light p-4 rounded border">
                                <h5 class="text-success mb-3"><i class="fas fa-comments me-2"></i>O que eles dizem sobre
                                    nós?</h5>
                                <p>Temos orgulho de compartilhar as experiências positivas de nossos pacientes. Acesse o
                                    painel de comentários para ler os depoimentos.</p>
                                <a href="<?= esc(url_path('paginas/comentarios.php')) ?>" class="btn btn-success"><i
                                        class="fas fa-external-link-alt me-2"></i>Ler Comentários</a>
                                
                                <p class="mt-4 mb-0">
                                    <strong>Total de pacientes cadastrados:</strong>
                                    <?= count($clientes) ?>
                                </p>
                            </div>
                        </div>
                    </div>
        

                    <!-- Galeria de Projetos/Clientes -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body p-4">
                            <h4 class="text-primary mb-4 text-center">Galeria de Unidades e Projetos</h4>
                            <div class="row g-3">
                                <div class="col-md-3">
                                   <img src="<?= esc(url_path('assets/img/medicos-andando.jpg')) ?>" class="img-fluid rounded shadow-sm galeria-item" style="cursor: pointer;" alt="Equipe em atendimento">
                                </div>
                                <div class="col-md-3">
                                    <img src="<?= esc(url_path('assets/img/medicos-cirurgia.jpg')) ?>" class="img-fluid rounded shadow-sm galeria-item" style="cursor: pointer;" alt="Bloco cirúrgico">
                                </div>
                                <div class="col-md-3">
                                    <img src="<?= esc(url_path('assets/img/medica-segurando.jpg')) ?>" class="img-fluid rounded shadow-sm galeria-item" style="cursor: pointer;" alt="Atendimento pediátrico">
                                </div>
                                <div class="col-md-3">
                                    <img src="<?= esc(url_path('assets/img/medica-injecao.jpg')) ?>" class="img-fluid rounded shadow-sm galeria-item" style="cursor: pointer;" alt="Vacinação">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para Zoom da Galeria -->
            <div class="modal fade" id="modalGaleria" tabindex="-1" aria-labelledby="modalGaleriaLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0 shadow-lg">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="modalGaleriaLabel">Visualização da Imagem</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-0 text-center">
                            <img src="" id="imgModal" class="img-fluid" alt="Imagem ampliada">
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
