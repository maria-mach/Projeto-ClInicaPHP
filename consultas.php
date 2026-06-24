<?php
$tituloPagina = 'Clínica | Consultas';
require_once __DIR__ . '/partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container pb-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="fw-bold text-success"><i class="fas fa-notes-medical me-2"></i>Consultas</h2>
                            <p class="text-muted">Agende sua consulta e mantenha sua saúde em dia.</p>
                        </div>
                    </div>

                    <!-- Busca e Filtro -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-8">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control"
                                    placeholder="Busque por consulta ou especialidade...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select shadow-sm">
                                <option selected>Filtrar por Especialidade/Tipo</option>
                                <option value="1">Clínico Geral</option>\n <option value="2">Cardiologia</option>\n
                                <option value="3">Pediatria</option>\n <option value="4">Ortopedia</option>\n
                            </select>
                        </div>
                    </div>

                    <!-- Cards de Conteúdo -->
                    <div class="row g-4">

                        <div class="col-md-6">
                            <div class="card card-outline card-success collapsed-card shadow-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Clínico Geral</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <p>Atendimento de rotina, check-ups e avaliação inicial para encaminhamentos.</p>
                                    <hr>
                                    <p class="mb-2"><strong>Valor da Consulta:</strong> R$ 120,00</p>
                                    <p class="mb-3">Necessário Agendamento Prévio: <strong
                                            class="text-success">Sim</strong></p>
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalAgendamento">
                                        <i class="bi bi-calendar-check me-2"></i>Escolher Unidade e Agendar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card card-outline card-success collapsed-card shadow-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Cardiologia</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <p>Prevenção, diagnóstico e tratamento de doenças do coração.</p>
                                    <hr>
                                    <p class="mb-2"><strong>Valor da Consulta:</strong> R$ 180,00</p>
                                    <p class="mb-3">Necessário Agendamento Prévio: <strong
                                            class="text-success">Sim</strong></p>
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalAgendamento">
                                        <i class="bi bi-calendar-check me-2"></i>Escolher Unidade e Agendar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card card-outline card-success collapsed-card shadow-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Pediatria</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <p>Acompanhamento e cuidado para a saúde das crianças e adolescentes.</p>
                                    <hr>
                                    <p class="mb-2"><strong>Valor da Consulta:</strong> R$ 150,00</p>
                                    <p class="mb-3">Necessário Agendamento Prévio: <strong
                                            class="text-success">Sim</strong></p>
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalAgendamento">
                                        <i class="bi bi-calendar-check me-2"></i>Escolher Unidade e Agendar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card card-outline card-success collapsed-card shadow-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Ortopedia</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <p>Tratamento de problemas relacionados a ossos, músculos e articulações.</p>
                                    <hr>
                                    <p class="mb-2"><strong>Valor da Consulta:</strong> R$ 160,00</p>
                                    <p class="mb-3">Necessário Agendamento Prévio: <strong
                                            class="text-success">Sim</strong></p>
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalAgendamento">
                                        <i class="bi bi-calendar-check me-2"></i>Escolher Unidade e Agendar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="container">
                        <div class="row mt-5 mb-4 px-3">
                            <div class="col-12 d-flex justify-content-between border-top pt-4">
                                <a href="index.php" class="text-decoration-none text-secondary">Início</a>
                                <div></div>
                            </div>
                        </div>

                    </div> <!-- /outer container -->
                </div> <!-- /app-content -->
            </div> <!-- /.app-main wrapper -->
        </main>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
