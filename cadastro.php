<?php
require_once __DIR__ . '/auth/funcs.php';

iniciar_sessao();

$tituloPagina = 'Clínica Geral | Cadastro';
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title><?= esc($tituloPagina) ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="color-scheme" content="light dark">
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)">
    <meta name="supported-color-schemes" content="light dark">

    <link rel="preload" href="<?= esc(url_path('css/adminlte.css')) ?>" as="style">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        crossorigin="anonymous" media="print" onload="this.media='all'">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous">

    <link rel="stylesheet" href="<?= esc(url_path('css/adminlte.css')) ?>">
    <link rel="stylesheet" href="<?= esc(url_path('css/meucss.css')) ?>">

    <link rel="shortcut icon" href="<?= esc(url_path('assets/img/logo-clinica.png')) ?>" type="image/x-icon">
</head>

<body class="register-page bg-body-secondary">
    <div class="register-box">
        <div class="register-logo">
            <div class="sidebar-brand">
                <a href="<?= esc(url_path('paginas/index.php')) ?>" class="brand-link">
                    <img src="<?= esc(url_path('assets/img/logo-clinica.png')) ?>" alt="Clínica Logo"
                        class="brand-image opacity-10 shadow">
                </a>
            </div>

            <a href="<?= esc(url_path('paginas/index.php')) ?>"><b>Clínica</b> Geral</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">Cadastre uma nova conta</p>

                <form action="<?= esc(url_path('auth/cadastrar.php')) ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="nome" class="form-control" placeholder="Nome completo" required>
                        <div class="input-group-text"><span class="bi bi-person"></span></div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termos" required>
                                <label class="form-check-label" for="termos">
                                    Concordo com os <a href="#">termos</a>
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </form>

                <p class="mb-0 mt-3">
                    <a href="<?= esc(url_path('login.php')) ?>" class="text-center">Já possuo uma conta</a>
                </p>
            </div>
        </div>
    </div>

    <button id="btnTopo" class="btn btn-success rounded-circle shadow position-fixed bottom-0 end-0 m-4 h1">
        <i class="bi bi-arrow-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
        crossorigin="anonymous"></script>

    <script src="<?= esc(url_path('js/adminlte.js')) ?>"></script>
    <script src="<?= esc(url_path('js/meujs.js')) ?>"></script>
</body>

</html>