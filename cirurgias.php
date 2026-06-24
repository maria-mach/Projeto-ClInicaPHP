<?php
$tituloPagina = 'Clínica | Cirurgias';
require_once __DIR__ . '/partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container pb-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="fw-bold text-success"><i class="fas fa-stethoscope me-2"></i>Cirurgias</h2>
                            <p class="text-muted">Estrutura moderna e equipe especializada para garantir segurança no
                                seu procedimento.</p>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-8">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control" placeholder="Busque por tipo de cirurgia...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select shadow-sm">
                                <option selected>Filtrar por Especialidade/Tipo</option>
                                <option value="1">Apendicectomia</option>
                                <option value="2">Cirurgia Cardíaca</option>
                                <option value="3">Cesariana</option>
                                <option value="4">Cirurgia Ortopédica</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card card-outline card-success collapsed-card shadow-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Apendicectomia</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <p>Cirurgia de emergência para a remoção do apêndice inflamado.</p>
                                    <hr>
                                    <p class="mb-2"><strong>Valor do Procedimento:</strong> A partir de R$ 4.500,00</p>
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
                                    <h3 class="card-title">Cirurgia Cardíaca (Ponte de Safena)</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <p>Procedimento focado em desobstrução e saúde arterial no coração.</p>
                                    <hr>
                                    <p class="mb-2"><strong>Valor do Procedimento:</strong> Sob consulta</p>
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
                                    <h3 class="card-title">Cesariana</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <p>Cirurgia obstétrica para a retirada segura do recém-nascido.</p>
                                    <hr>
                                    <p class="mb-2"><strong>Valor do Procedimento:</strong> A partir de R$ 6.000,00</p>
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
                                    <h3 class="card-title">Cirurgia Ortopédica de Joelho</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <p>Procedimento cirúrgico para reconstrução de ligamentos ou correção da
                                        articulação.</p>
                                    <hr>
                                    <p class="mb-2"><strong>Valor do Procedimento:</strong> A partir de R$ 8.500,00</p>
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
                            <a href="index.php" class="text-decoration-none text-secondary">Início</a>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
