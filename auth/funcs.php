<?php
function iniciar_sessao(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function url_path(string $relativePath): string
{
    return '/ClinicaPHP/' . ltrim($relativePath, '/');
}

function foto_usuario_url(?string $foto): string
{
    $caminhoFoto = $foto ?: 'assets/img/padrao.png';
    $url = url_path($caminhoFoto);
    $arquivoFoto = __DIR__ . '/../' . ltrim($caminhoFoto, '/');

    if (is_file($arquivoFoto)) {
        $url .= '?v=' . filemtime($arquivoFoto);
    }

    return $url;
}

function usuario_logado(): bool
{
    return !empty($_SESSION['usuario_id']);

 }
function usuario(): array
{
    return [
        'id' => $_SESSION['usuario_id'] ?? null,
        'nome' => $_SESSION['nome'] ?? '',
        'tipo' => $_SESSION['tipo'] ?? '',
        'foto' => $_SESSION['foto'] ?? '',
    ];
}

// Verifica se o usuário logado é administrador.
function is_admin(): bool
{
    return usuario_logado() && ($_SESSION['tipo'] ?? '') === 'admin';
}

// Verifica se o usuário logado é cliente.
function is_cliente(): bool
{
    return usuario_logado() && ($_SESSION['tipo'] ?? '') === 'cliente';
}

function fazer_logout(): void
{
    iniciar_sessao();
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }

    session_destroy();
}

function redirecionar(string $local): void
{
    header('Location: ' . $local);
    exit;
}

function esc(string $valor): string
{
    return htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
}

function contar_acesso_restrito(): int
{
    iniciar_sessao();

    if (!isset($_SESSION['visitas_restrita'])) {
        $_SESSION['visitas_restrita'] = 1;
    } else {
        $_SESSION['visitas_restrita']++;
    }

    return $_SESSION['visitas_restrita'];
}
