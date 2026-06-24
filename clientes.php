<?php
$tituloPagina = 'Clínica Geral | Clientes';
require_once __DIR__ . '/partials/header.php';
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
                                <div class="col-md-4">
                                    <img src="./assets/img/avatar3.png" class="rounded-circle mb-3 shadow" width="100"
                                        alt="Cliente 1">
                                    <h5>Maria Silva</h5>
                                    <p class="text-muted small">Paciente desde 2021</p>
                                </div>
                                <div class="col-md-4">
                                    <img src="./assets/img/avatar.png" class="rounded-circle mb-3 shadow" width="100"
                                        alt="Cliente 2">
                                    <h5>João Rodrigues</h5>
                                    <p class="text-muted small">Atendimento Corporativo</p>
                                </div>
                                <div class="col-md-4">
                                    <img src="./assets/img/avatar2.png" class="rounded-circle mb-3 shadow" width="100"
                                        alt="Cliente 3">
                                    <h5>Ana Clara</h5>
                                    <p class="text-muted small">Saúde da Família</p>
                                </div>
                            </div>
                            <div class="text-center mt-4 bg-light p-4 rounded border">
                                <h5 class="text-success mb-3"><i class="fas fa-comments me-2"></i>O que eles dizem sobre
                                    nós?</h5>
                                <p>Temos orgulho de compartilhar as experiências positivas de nossos pacientes. Acesse o
                                    painel de comentários para ler os depoimentos.</p>
                                <a href="comentarios.php" class="btn btn-success"><i
                                        class="fas fa-external-link-alt me-2"></i>Ler Comentários</a>
                                <p  class="mt-2">Quantidade de clientes: <span id="contador">0</span></p>
                                <button id="btn_contador" class="btn btn-success"><i
                                        class="fas fa-external-link-alt me-2"></i>Adicione Clientes</button>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Galeria de Projetos/Clientes -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body p-4">
                            <h4 class="text-primary mb-4 text-center">Galeria de Unidades e Projetos</h4>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <img src="./assets/img/medicos-andando.jpg" class="img-fluid rounded shadow-sm galeria-item" style="cursor: pointer;" alt="Equipe em atendimento">
                                </div>
                                <div class="col-md-3">
                                    <img src="./assets/img/medicos-cirurgia.jpg" class="img-fluid rounded shadow-sm galeria-item" style="cursor: pointer;" alt="Bloco cirúrgico">
                                </div>
                                <div class="col-md-3">
                                    <img src="./assets/img/medica-segurando.jpg" class="img-fluid rounded shadow-sm galeria-item" style="cursor: pointer;" alt="Atendimento pediátrico">
                                </div>
                                <div class="col-md-3">
                                    <img src="./assets/img/medica-injecao.jpg" class="img-fluid rounded shadow-sm galeria-item" style="cursor: pointer;" alt="Vacinação">
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

            <div class="container">
                <div class="row mt-5 mb-4 px-3">
                    <div class="col-12 d-flex justify-content-between border-top pt-4">
                        <a href="empresa.php" class="text-decoration-none text-secondary">Empresa</a>
                        <a href="detalhes.php" class="text-decoration-none text-primary fw-bold">Detalhes</a>
                        <a href="local.php" class="text-decoration-none text-primary fw-bold">Local</a>
                    </div>
                </div>
            </div>
        </main>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
