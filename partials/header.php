<?php
require_once __DIR__ . '/../auth/funcs.php';
iniciar_sessao();
$usuario = usuario();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($tituloPagina ?? "Clínica Geral") ?></title>

    <link rel="stylesheet" href="<?= esc(url_path('css/adminlte.css')) ?>">
    <link rel="stylesheet" href="<?= esc(url_path('css/meucss.css')) ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="shortcut icon" href="<?= esc(url_path('assets/img/logo-clinica.png')) ?>" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">

        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a href="<?= esc(url_path('paginas/index.php')) ?>" class="nav-link">Início</a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a href="<?= esc(url_path('paginas/contato.php')) ?>" class="nav-link">Contato</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="<?= esc(url_path('assets/img/avatar4.png')) ?>" class="user-image rounded-circle shadow" alt="User Image">
                            <span class="d-none d-md-inline">
                                <?= esc($usuario['nome'] ?: 'Usuário') ?>
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

                            <li class="user-header cg-bg-secundaria">
                                <img src="<?= esc(url_path('assets/img/avatar4.png')) ?>" class="rounded-circle shadow" alt="User Image">

                                <p>
                                    <?= usuario_logado() ? esc($usuario['nome']) : 'Bem-vindo!' ?>
                                    <small>
                                        <?= usuario_logado() ? esc($usuario['tipo']) : 'Faça login para continuar' ?>
                                    </small>
                                </p>
                            </li>

                            <?php if (!usuario_logado()): ?>

                                <li class="p-3">

                                    <form action="<?= esc(url_path('auth/autenticar.php')) ?>" method="post">

                                        <div class="mb-2">
                                            <input
                                                type="email"
                                                name="email"
                                                class="form-control form-control-sm"
                                                placeholder="Email"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <input
                                                type="password"
                                                name="senha"
                                                class="form-control form-control-sm"
                                                placeholder="Senha"
                                                required>
                                        </div>

                                        <button type="submit" class="btn btn-success btn-sm w-100">
                                            Entrar
                                        </button>

                                    </form>

                                    <hr>

                                    <a href="<?= esc(url_path('cadastro.php')) ?>"
                                    class="btn btn-outline-success btn-sm w-100">
                                        Fazer cadastro
                                    </a>

                                </li>

                            <?php elseif ($usuario['tipo'] === 'cliente'): ?>

                                <li>
                                    <a class="dropdown-item" href="<?= esc(url_path('cliente/perfil.php')) ?>">
                                        Meu Perfil
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="<?= esc(url_path('cliente/meus_agendamentos.php')) ?>">
                                        Meus Agendamentos
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item text-danger" href="<?= esc(url_path('auth/logout.php')) ?>">
                                        Sair
                                    </a>
                                </li>

                            <?php else: ?>

                                <li>
                                    <a class="dropdown-item" href="<?= esc(url_path('admin/dashboard.php')) ?>">
                                        Dashboard
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="<?= esc(url_path('cliente/perfil.php')) ?>">
                                        Meu Perfil
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item text-danger" href="<?= esc(url_path('auth/logout.php')) ?>">
                                        Sair
                                    </a>
                                </li>

                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

    <aside class="app-sidebar cg-bg-primaria shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
            <a href="<?= esc(url_path('paginas/index.php')) ?>" class="brand-link">
                <img src="<?= esc(url_path('assets/img/logo-clinica.png')) ?>" alt="Clinica Logo" class="brand-image opacity-10 shadow">
                <span class="brand-text fw-light">Clínica Geral</span>
            </a>
        </div>

        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" data-accordion="false" id="navigation">

                    <li class="nav-item">
                        <a href="<?= esc(url_path('paginas/index.php')) ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= esc(url_path('admin/cadastrar_servico.php')) ?>" class="nav-link">
                            <i class="nav-icon fas fa-notes-medical"></i>
                            <p>Cadastrar Serviço</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-hospital"></i>
                            <p>
                                Clínica
                                <i class="nav-arrow fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= esc(url_path('paginas/empresa.php')) ?>" class="nav-link">
                                    <i class="nav-icon fas fa-building"></i>
                                    <p>Empresa</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= esc(url_path('paginas/contato.php')) ?>" class="nav-link">
                                    <i class="nav-icon fas fa-envelope"></i>
                                    <p>Contato</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= esc(url_path('paginas/local.php')) ?>" class="nav-link">
                                    <i class="nav-icon fas fa-map-marker-alt"></i>
                                    <p>Local</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-briefcase-medical"></i>
                            <p>
                                Atendimento
                                <i class="nav-arrow fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= esc(url_path('paginas/servico.php')) ?>" class="nav-link">
                                    <i class="nav-icon fas fa-box-open"></i>
                                    <p>Produto ou Serviço</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= esc(url_path('paginas/consultas.php')) ?>" class="nav-link">
                                    <i class="nav-icon fas fa-notes-medical"></i>
                                    <p>Consultas</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= esc(url_path('paginas/exames.php')) ?>" class="nav-link">
                                    <i class="nav-icon fas fa-vials"></i>
                                    <p>Exames</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= esc(url_path('paginas/cirurgias.php')) ?>" class="nav-link">
                                    <i class="nav-icon fas fa-stethoscope"></i>
                                    <p>Cirurgias</p>
                                </a>
                                </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle-info"></i>
                            <p>
                                Informações
                                <i class="nav-arrow fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= esc(url_path('paginas/detalhes.php')) ?>" class="nav-link">
                                    <i class="nav-icon fas fa-info-circle"></i>
                                    <p>Detalhes</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= esc(url_path('paginas/precos.php')) ?>" class="nav-link">
                                    <i class="nav-icon fas fa-tags"></i>
                                    <p>Preços</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= esc(url_path('paginas/comentarios.php')) ?>" class="nav-link">
                                    <i class="nav-icon fas fa-comments"></i>
                                    <p>Comentários</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= esc(url_path('paginas/redes_sociais.php')) ?>" class="nav-link">
                                    <i class="nav-icon fas fa-share-alt"></i>
                                    <p>Redes Sociais</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?= esc(url_path('paginas/clientes.php')) ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Clientes</p>
                        </a>
                    </li>

                    <?php if (is_cliente()): ?>
                        <li class="nav-item">
                            <a href="<?= esc(url_path('cliente/meus_agendamentos.php')) ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-calendar-check"></i>
                                <p>Meus Agendamentos</p>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </aside>