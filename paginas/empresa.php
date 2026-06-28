<?php
$tituloPagina = 'Clínica Geral | Empresa';
require_once __DIR__ . '/../partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container">

                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="fw-bold text-success"><i class="fas fa-building me-2"></i>Empresa</h2>
                            <p class="text-muted">Bem-vindo à seção Empresa.</p>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body p-5">
                            <h4 class="text-success mb-4">Nossa História</h4>
                            <p>A <strong>Clínica Geral</strong> nasceu do sonho de oferecer um atendimento médico
                                humanizado, acessível e de altíssima qualidade. Com mais de 10 anos de experiência,
                                nossa equipe multidisciplinar está pronta para cuidar da sua saúde e da sua família em
                                todas as etapas da vida.</p>

                            <hr class="my-4">

                            <div class="row g-4 text-center mt-2">
                                <div class="col-md-4">
                                    <i class="fas fa-bullseye text-primary fs-2 mb-3"></i>
                                    <h5 class="fw-bold">Missão</h5>
                                    <p class="text-muted small">Promover saúde e bem-estar através de excelência médica
                                        e cuidado humanizado.</p>
                                </div>
                                <div class="col-md-4">
                                    <i class="fas fa-eye text-primary fs-2 mb-3"></i>
                                    <h5 class="fw-bold">Visão</h5>
                                    <p class="text-muted small">Ser referência regional em atendimento multidisciplinar
                                        prevenindo e tratando com inovação.</p>
                                </div>
                                <div class="col-md-4">
                                    <i class="fas fa-heart text-primary fs-2 mb-3"></i>
                                    <h5 class="fw-bold">Valores</h5>
                                    <p class="text-muted small">Ética, respeito, empatia, transparência e compromisso
                                        constante com a vida.</p>
                                </div>
                            </div>

                            <div class="text-center mt-5 bg-light p-4 rounded border">
                                <h5 class="mb-3">Quer nos fazer uma visita?</h5>
                                <p class="text-muted">Possuímos várias unidades estrategicamente localizadas para melhor
                                    atender você.</p>
                                <a href="<?= esc(url_path('paginas/local.php')) ?>" class="btn btn-primary mt-2"><i
                                        class="fas fa-map-marker-alt me-2"></i>Ver Nossas Unidades</a>
                                <button id="infoClick" class="btn btn-primary mt-2"><i
                                        class="fas fa-info-circle me-2"></i>Mais detalhes sobre nós</button>
                                <p id="infoMostrar" class="extra-content d-none mt-3 text-start">Nossa clínica conta com infraestrutura moderna, equipamentos de última geração e uma equipe de especialistas altamente capacitados. Atuamos com foco na segurança do paciente e na precisão diagnóstica, oferecendo um ambiente acolhedor e suporte completo em todas as etapas do seu tratamento.</p>
                            </div>




                        </div> <!-- /.container -->
                    </div> <!-- /.card -->
                </div> <!-- /.container -->
            </div> <!-- /.app-content -->
        </main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
