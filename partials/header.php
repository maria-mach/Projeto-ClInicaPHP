<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tituloPagina ?? "Clínica Geral"; ?></title>

    <link rel="stylesheet" href="./css/adminlte.css">
    <link rel="stylesheet" href="./css/meucss.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print"
        onload="this.media='all'" />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />

    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="shortcut icon" href="./assets/img/logo-clinica.png" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">
        <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1060;">
            <div id="welcomeToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                <div class="toast-header">
                    <strong class="me-auto text-success">Clínica Geral</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Bem-vindo a nossa clínica!!
                </div>
            </div>
        </div>
        <nav class="app-header navbar navbar-expand bg-body bg">
            <!--begin::Container-->
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuHamburguer"
                    aria-controls="menuHamburguer" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block"><a href="index.php" class="nav-link">Início</a></li>
                    <li class="nav-item d-none d-md-block"><a href="contato.php" class="nav-link">Contato</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <!--begin::Navbar Search-->
                    <!--end::Navbar Search-->
                    <!--begin::Messages Dropdown Menu-->

                    <!--end::Fullscreen Toggle-->
                    <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="./assets/img/avatar4.png" class="user-image rounded-circle shadow"
                                alt="User Image" />
                            <span class="d-none d-md-inline">Usuario</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <!--begin::User Image-->
                            <li class="user-header cg-bg-secundaria">
                                <img src="./assets/img/avatar4.png" class="rounded-circle shadow" alt="User Image" />
                                <p>Usuario
                                    <small>Entre/cria uma conta</small>
                                </p>
                            </li>
                            <!--begin::Menu Footer-->
                            <li class="user-footer">
                                <a href="./login.php" class="btn btn-default btn-flat cg-border-secundaria">Inicie a
                                    sessão</a>
                                <a href="#" class="btn btn-default btn-flat cg-border-secundaria float-end">Cadastro</a>
                            </li>
                            <!--end::Menu Footer-->
                        </ul>
                    </li>
                    <!--end::User Menu Dropdown-->
                </ul>
            </div>
            <!--end::Container-->
        </nav> <!-- /.app-header -->

        <aside class="app-sidebar cg-bg-primaria shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="./index.php" class="brand-link">
                    <!--begin::Brand Image-->
                    <img src="./assets/img/logo-clinica.png" alt="Clinica Logo" class="brand-image opacity-10 shadow" />
                    <!--end::Brand Image-->
                    <!--begin::Brand Text-->
                    <span class="brand-text fw-light">Clínica Geral</span>
                    <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
            </div>
            <!--end::Sidebar Brand-->
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                        aria-label="Main navigation" data-accordion="false" id="navigation">

                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="servico.php" class="nav-link">
                                <i class="nav-icon fas fa-box-open"></i>
                                <p>Produto ou Serviço</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="consultas.php" class="nav-link">
                                <i class="nav-icon fas fa-notes-medical"></i>
                                <p>Consultas</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="exames.php" class="nav-link">
                                <i class="nav-icon fas fa-vials"></i>
                                <p>Exames</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="cirurgias.php" class="nav-link">
                                <i class="nav-icon fas fa-stethoscope"></i>
                                <p>Cirurgias</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="empresa.php" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>Empresa</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="contato.php" class="nav-link">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>Contato</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="detalhes.php" class="nav-link">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p>Detalhes</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="clientes.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Clientes</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="local.php" class="nav-link">
                                <i class="nav-icon fas fa-map-marker-alt"></i>
                                <p>Local</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="precos.php" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>Preços</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="comentarios.php" class="nav-link">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>Comentários</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="redes_sociais.php" class="nav-link">
                                <i class="nav-icon fas fa-share-alt"></i>
                                <p>Redes Sociais</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="login.php" class="nav-link">
                                <i class="nav-icon fa-solid fa-calendar-check"></i>
                                <p>Meus Agendamentos</p>
                            </a>
                        </li>
                    </ul>
                    <!--end::Sidebar Menu-->
                </nav>
            </div> <!-- /.sidebar-wrapper -->
        </aside> <!-- /.app-sidebar -->

