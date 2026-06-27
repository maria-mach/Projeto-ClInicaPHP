<?php
$tituloPagina = 'Clínica Geral | Contato';
require_once __DIR__ . '/../partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container">

                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="fw-bold text-success"><i class="fas fa-envelope me-2"></i>Contato</h2>
                            <p class="text-muted">Bem-vindo à seção Contato.</p>
                        </div>
                    </div>


                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0"><i class="bi bi-headset me-2"></i>Canais de Atendimento</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="bi bi-telephone-fill text-primary fs-3 me-3"></i>
                                            <div>
                                                <strong>Telefone Clínico</strong><br>
                                                <span class="text-muted">(11) 4002-8922</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="bi bi-whatsapp text-success fs-3 me-3"></i>
                                            <div>
                                                <strong>WhatsApp</strong><br>
                                                <span class="text-muted">(11) 98765-4321</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="bi bi-envelope-fill text-danger fs-3 me-3"></i>
                                            <div>
                                                <strong>E-mail</strong><br>
                                                <span class="text-muted">contato@clinicageral.com.br</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="bi bi-instagram text-warning fs-3 me-3"></i>
                                            <div>
                                                <strong>Instagram</strong><br>
                                                <span class="text-muted">@clinicageral_oficial</span>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="mt-4 text-center">
                                        <a href="https://wa.me/5511987654321" target="_blank" class="btn btn-success"><i
                                                class="bi bi-whatsapp"></i> Chamar no WhatsApp</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-header bg-success text-white">
                                    <h5 class="mb-0"><i class="bi bi-envelope-paper me-2"></i>Envie uma Mensagem</h5>
                                </div>
                                <div class="card-body">
                                    <div id="mensagem" class="erro"></div>
                                    <form id="formOb">
                                        <div class="mb-3">
                                            <label class="form-label">Nome Completo</label>
                                            <input id="nome" type="text" class="form-control" placeholder="Seu nome">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">E-mail</label>
                                            <input id="email" type="email" class="form-control" placeholder="nome@exemplo.com">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Assunto</label>
                                            <input type="text" class="form-control"
                                                placeholder="Dúvida, sugestão, elogio...">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mensagem</label>
                                            <textarea id="txt_mensagem" class="form-control" rows="4"
                                                placeholder="Escreva sua mensagem aqui"></textarea>
                                            <div id="txt_contador"></div>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Enviar Mensagem</button>
                                    </form>
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col-md-6 (Envie uma Mensagem) -->
                    </div> <!-- /.row g-4 (Canais + Form) -->

                    <div class="container">
                        <div class="row mt-5 mb-4 px-3">
                            <div class="col-12 d-flex justify-content-between border-top pt-4">
                                <a href="<?= esc(url_path('paginas/empresa.php')) ?>" class="text-decoration-none text-secondary">Empresa</a>
                                <a href="<?= esc(url_path('paginas/local.php')) ?>" class="text-decoration-none text-primary fw-bold">Locais</a>
                            </div>
                        </div>
                    </div> <!-- /.container (Empresa/Locais links) -->
                </div> <!-- /.container (main content) -->
            </div> <!-- /.app-content -->
        </main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
