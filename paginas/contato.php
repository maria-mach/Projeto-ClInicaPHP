<?php
$tituloPagina = 'Clínica Geral | Contato';
require_once __DIR__ . '/../partials/header.php';

$sucesso = filter_input(INPUT_GET, 'sucesso', FILTER_VALIDATE_INT);
$erro = filter_input(INPUT_GET, 'erro', FILTER_VALIDATE_INT);

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
                                    <h5 class="mb-0"><i class="bi bi-envelope-paper me-2"></i>Comentários, Sugestões e Dúvidas.</h5>
                                </div>
                                <div class="card-body">
                                    <div id="mensagem"></div>
                                    <?php if ($sucesso === 1): ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Sua mensagem foi enviada com sucesso!
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($erro === 2): ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Ocorreu um erro ao enviar sua mensagem. Tente novamente.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php endif; ?>
                                    <form id="formOb" action="<?= esc(url_path('database/comentarios/cadastrar_comentario.php')) ?>" method="POST">

                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome Completo</label>
                                            <input
                                                id="nome"
                                                name="nome"
                                                type="text"
                                                class="form-control"
                                                placeholder="Seu nome"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">E-mail</label>
                                            <input
                                                id="email"
                                                name="email"
                                                type="email"
                                                class="form-control"
                                                placeholder="nome@exemplo.com"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="assunto" class="form-label">Assunto</label>
                                            <input
                                                id="assunto"
                                                name="assunto"
                                                type="text"
                                                class="form-control"
                                                placeholder="Assunto da mensagem"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tipo" class="form-label">Tipo de mensagem</label>
                                            <select
                                                id="tipo"
                                                name="tipo"
                                                class="form-select"
                                                required>

                                                <option value="">Selecione...</option>
                                                <option value="comentario">Comentário</option>
                                                <option value="duvida">Dúvida</option>
                                                <option value="sugestao">Sugestão</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="txt_mensagem" class="form-label">Mensagem</label>
                                            <textarea
                                                id="txt_mensagem"
                                                name="mensagem"
                                                class="form-control"
                                                rows="5"
                                                maxlength="500"
                                                placeholder="Escreva sua mensagem aqui"
                                                required></textarea>

                                            <div id="txt_contador" class="form-text text-end">
                                                0 / 500 caracteres
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100">
                                            Enviar Mensagem
                                        </button>

                                    </form>
                                </div> 
                            </div> <!-- /.card -->
                        </div> 
                    </div> 
                </div> <!-- /.container (main content) -->
            </div> <!-- /.app-content -->
        </main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
