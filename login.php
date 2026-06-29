<?php
require_once __DIR__ . '/auth/funcs.php';

iniciar_sessao();

$tituloPagina = 'Clínica Geral | Página de Login';
$erroLogin = filter_input(INPUT_GET, 'erro', FILTER_VALIDATE_INT);
$cadastro = $_GET['cadastro'] ?? '';
$sucesso = filter_input(INPUT_GET, 'sucesso', FILTER_VALIDATE_INT);

$mensagemErro = '';
$mensagemSucesso = '';

if ($erroLogin === 1) {
    $mensagemErro = 'Email ou senha inválidos. Tente novamente.';
}

if ($cadastro === 'sucesso' || $sucesso === 1) {
    $mensagemSucesso = 'Cadastro realizado com sucesso! Agora faça login para acessar sua conta.';
}
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

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        crossorigin="anonymous" media="print" onload="this.media='all'">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous">

    <link rel="stylesheet" href="<?= esc(url_path('css/adminlte.css')) ?>">
    <link rel="stylesheet" href="<?= esc(url_path('css/meucss.css')) ?>">

    <link rel="shortcut icon"
        href="<?= esc(url_path('assets/img/logo-clinica.png')) ?>"
        type="image/x-icon">
</head>

<body class="login-page bg-body-secondary">

    <div class="login-box">

        <div class="login-logo">
            <div class="sidebar-brand">
                <a href="<?= esc(url_path('paginas/index.php')) ?>" class="brand-link">
                    <img src="<?= esc(url_path('assets/img/logo-clinica.png')) ?>"
                        alt="Clínica Logo"
                        class="brand-image opacity-10 shadow">
                </a>
            </div>

            <a href="<?= esc(url_path('paginas/index.php')) ?>">
                <b>Clínica</b> Geral
            </a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">

                <p class="login-box-msg">
                    Entre na sua conta para iniciar sessão.
                </p>

                <?php if ($mensagemErro): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= esc($mensagemErro) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if ($mensagemSucesso): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= esc($mensagemSucesso) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form action="<?= esc(url_path('auth/autenticar.php')) ?>" method="post">

                    <div class="input-group mb-3">
                        <input type="email"
                            name="email"
                            class="form-control"
                            placeholder="Email"
                            required>

                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password"
                            name="senha"
                            class="form-control"
                            placeholder="Senha"
                            required>

                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input"
                                    type="checkbox"
                                    id="lembrar">

                                <label class="form-check-label" for="lembrar">
                                    Lembre-me
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">
                                    Entrar
                                </button>
                            </div>
                        </div>

                    </div>

                </form>

                <p class="mb-1 mt-3">
                    <a href="#">Esqueci minha senha</a>
                </p>

                <p class="mb-0">
                    <a href="<?= esc(url_path('cadastro.php')) ?>" class="text-center">
                        Cadastre uma nova conta
                    </a>
                </p>

            </div>
        </div>

    </div>

    <button id="btnTopo"
        class="btn btn-success rounded-circle shadow position-fixed bottom-0 end-0 m-4 h1">
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