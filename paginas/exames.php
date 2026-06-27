<?php
$tituloPagina = 'Clínica | Exames';
require_once __DIR__ . '/../partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container pb-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="fw-bold text-success"><i class="fas fa-vials me-2"></i>Exames</h2>
                            <p class="text-muted">Resultados rápidos e precisos para cuidar da sua saúde com confiança.
                            </p>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-8">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control"
                                    placeholder="Busque por exame laboratorial ou de imagem...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select shadow-sm">
                                <option selected>Filtrar por Especialidade/Tipo</option>
                                <option value="1">Exame de Sangue</option>
                                <option value="2">Raio-X</option>
                                <option value="3">Ultrassonografia</option>
                                <option value="4">Tomografia</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card card-outline card-success collapsed-card shadow-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Exame de Sangue (Hemograma)</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <p>Exame de rotina para avaliar a saúde geral do paciente.</p>
                                    <hr>
                                    <p class="mb-2"><strong>Valor do Exame:</strong> R$ 45,00</p>
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
                                    <h3 class="card-title">Raio-X do Tórax</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <p>Exame de imagem utilizado para checar pulmões e estrutura óssea.</p>
                                    <hr>
                                    <p class="mb-2"><strong>Valor do Exame:</strong> R$ 90,00</p>
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
                                    <h3 class="card-title">Ultrassonografia</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <p>Exame de imagem não invasivo para visualização detalhada de órgãos internos.</p>
                                    <hr>
                                    <p class="mb-2"><strong>Valor do Exame:</strong> R$ 130,00</p>
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
                                    <h3 class="card-title">Tomografia Computadorizada</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <p>Exame de diagnóstico por imagem de alta definição para investigar anomalias
                                        complexas.</p>
                                    <hr>
                                    <p class="mb-2"><strong>Valor do Exame:</strong> R$ 450,00</p>
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

                    <div class="row mt-5 mb-4 px-3">
                        <div class="col-12 d-flex justify-content-between border-top pt-4">
                            <a href="<?= esc(url_path('paginas/index.php')) ?>" class="text-decoration-none text-secondary">Início</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
