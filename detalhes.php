<?php
$tituloPagina = 'Clínica Geral | Detalhes';
require_once __DIR__ . '/partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container py-5">

                    <div id="sec-consultas" class="card shadow-sm mb-5 p-4 border-0">
                        <div class="card-body">
                            <h2 class="text-success fw-bold text-center mb-4">Consultas</h2>

                            <!-- imagem -->
                            <div class="text-center mb-4">
                                <img src="./assets/img/medica-segurando.jpg" class="img-fluid rounded shadow-sm w-50"
                                    alt="Médica verificando cordão de soro">
                            </div>

                            <!-- botão -->
                            <div class="text-center mb-4">
                                <a href="consultas.php" class="btn btn-success btn-lg shadow-sm">
                                    Agendar Consulta
                                </a>
                            </div>

                            <div id="btnVerDetalhes" class="mb-3 text-center mt-5 bg-light p-4 rounded shadow-sm border">
                                <button id="VerDetalhes" class="btn btn-primary btn-ver-detalhes" data-target="infoDetalhes">
                                    <i class="fas fa-map-marker-alt me-2"></i>Ver mais detalhes
                                </button>
                            </div>

                            <!-- informações -->
                            <div id="infoDetalhes" class="mb-3 d-none">
                                <div class="card border">
                                    <div class="card-body">
                                        <h5 class="text-primary fw-bold mb-3">Mais informações</h5>
                                        <p>
                                            Oferecemos atendimento humanizado em diversas especialidades,
                                            com foco na sua saúde e bem-estar.
                                        </p>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Clínica geral, pediatria, ginecologia, cardiologia</li>
                                            <li class="list-group-item">Retorno gratuito em até 7 dias</li>
                                            <li class="list-group-item">Atendimento também aos sábados</li>
                                            <li class="list-group-item">Convênios e parcelamento disponíveis</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- preços -->
                            <div class="alert alert-light border shadow-sm text-center">
                                <strong>Preços médios:</strong><br>
                                Consultas a partir de <span class="text-success fw-bold">R$120,00</span><br>
                                Teleconsultas a partir de <span class="text-success fw-bold">R$90,00</span>
                            </div>
                        </div>
                    </div>


                    <div id="sec-exames" class="card shadow-sm mb-5 p-4 border-0">
                        <div class="card-body">
                            <h2 class="text-success fw-bold text-center mb-4">Exames</h2>

                            <!-- imagem -->
                            <div class="text-center mb-4">
                                <img src="./assets/img/medica-injecao.jpg" class="img-fluid rounded shadow-sm w-50"
                                    alt="Médica aplicando injeção">
                            </div>

                            <!-- botão -->
                            <div class="text-center mb-4">
                                <a href="exames.php" class="btn btn-success btn-lg shadow-sm">
                                    Agendar Exame
                                </a>
                            </div>

                            <div id="btnVerDetalhesExames" class="mb-3 text-center mt-5 bg-light p-4 rounded shadow-sm border">
                                <button id="VerDetalhesExames" class="btn btn-primary btn-ver-detalhes" data-target="infoDetalhesExames">
                                    <i class="fas fa-vials me-2"></i>Ver mais detalhes
                                </button>
                            </div>

                            <!-- informações -->
                            <div id="infoDetalhesExames" class="mb-3 d-none">
                                <div class="card border">
                                    <div class="card-body">
                                        <h5 class="text-primary fw-bold mb-3">Mais informações sobre Exames</h5>
                                        <p>
                                            Realizamos exames laboratoriais e de imagem com equipamentos modernos
                                            e equipe especializada.
                                        </p>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Exames de sangue, urina e fezes</li>
                                            <li class="list-group-item">Raio-X, ultrassonografia e tomografia</li>
                                            <li class="list-group-item">Resultados disponíveis online</li>
                                            <li class="list-group-item">Atendimento rápido e seguro</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- preços -->
                            <div class="alert alert-light border shadow-sm text-center">
                                <strong>Preços médios:</strong><br>
                                Exames laboratoriais a partir de <span class="text-success fw-bold">R$40,00</span><br>
                                Exames de imagem a partir de <span class="text-success fw-bold">R$150,00</span>
                            </div>
                        </div>
                    </div>


                    <div id="sec-cirurgias" class="card shadow-sm mb-5 p-4 border-0">
                        <div class="card-body">
                            <h2 class="text-success fw-bold text-center mb-4">Cirurgias</h2>

                            <!-- imagem -->
                            <div class="text-center mb-4">
                                <img src="./assets/img/medicos-cirurgia.jpg" class="img-fluid rounded shadow-sm w-50"
                                    alt="Equipe médica em cirurgia">
                            </div>

                            <!-- botão -->
                            <div class="text-center mb-4">
                                <a href="cirurgias.php" class="btn btn-success btn-lg shadow-sm">
                                    Agendar Cirurgia
                                </a>
                            </div>

                            <div id="btnVerDetalhesCirurgias" class="mb-3 text-center mt-5 bg-light p-4 rounded shadow-sm border">
                                <button id="VerDetalhesCirurgias" class="btn btn-primary btn-ver-detalhes" data-target="infoDetalhesCirurgias">
                                    <i class="fas fa-stethoscope me-2"></i>Ver mais detalhes
                                </button>
                            </div>

                            <!-- informações -->
                            <div id="infoDetalhesCirurgias" class="mb-3 d-none">
                                <div class="card border">
                                    <div class="card-body">
                                        <h5 class="text-primary fw-bold mb-3">Mais informações sobre Cirurgias</h5>
                                        <p>
                                            Realizamos procedimentos cirúrgicos com segurança,
                                            tecnologia avançada e equipe altamente qualificada.
                                        </p>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Cirurgias eletivas e de emergência</li>
                                            <li class="list-group-item">Equipe multidisciplinar especializada</li>
                                            <li class="list-group-item">Estrutura hospitalar moderna</li>
                                            <li class="list-group-item">Acompanhamento pós-operatório</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- preços -->
                            <div class="alert alert-light border shadow-sm text-center">
                                <strong>Preços médios:</strong><br>
                                Cirurgias eletivas a partir de <span class="text-success fw-bold">R$3.500,00</span><br>
                                Procedimentos ambulatoriais a partir de <span
                                    class="text-success fw-bold">R$1.200,00</span>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="container">
                    <div class="row mt-5 mb-4 px-3">
                        <div class="col-12 d-flex justify-content-between border-top pt-4">
                            <a href="servico.php" class="text-decoration-none text-secondary">Serviços</a>
                            <a href="clientes.php" class="text-decoration-none text-primary fw-bold">Sobre Clientes</a>
                            <a href="precos.php" class="text-decoration-none text-primary fw-bold">Ver Preços</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
