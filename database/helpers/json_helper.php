<?php

function resposta_json(
    bool $sucesso,
    mixed $dados = null,
    string $mensagem = '',
    int $statusCode = 200
): never {
    http_response_code($statusCode);
    header('Content-Type: application/json; charset=utf-8');

    $payload = json_encode([
        'sucesso' => $sucesso,
        'mensagem' => $mensagem,
        'dados' => $dados
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    if ($payload === false) {
        $payload = json_encode([
            'sucesso' => false,
            'mensagem' => 'Não foi possível serializar a resposta JSON.',
            'dados' => null
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    echo $payload;
    exit;
}