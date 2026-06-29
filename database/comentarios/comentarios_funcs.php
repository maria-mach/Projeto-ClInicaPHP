<?php
require_once __DIR__ . '/../conexao.php';

function listar_comentarios_ativos(): array
{
    global $conexao;

    $sql = "SELECT id, nome, mensagem
            FROM comentarios
            WHERE status = 'aprovado'
            AND tipo = 'comentario'
            ORDER BY criado_em DESC";

    $stmt = $conexao->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function inserir_comentario(
    string $nome,
    string $email,
    string $assunto,
    string $tipo,
    string $mensagem
): bool {
    global $conexao;

    $sql = "INSERT INTO comentarios 
            (nome, email, assunto, tipo, mensagem, status)
            VALUES 
            (:nome, :email, :assunto, :tipo, :mensagem, 'pendente')";

    $stmt = $conexao->prepare($sql);

    return $stmt->execute([
        'nome' => $nome,
        'email' => $email,
        'assunto' => $assunto,
        'tipo' => $tipo,
        'mensagem' => $mensagem
    ]);
}

function atualizar_status_comentario(int $id, string $status): bool
{
    global $conexao;

    $sql = "UPDATE comentarios
            SET status = :status
            WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    return $stmt->execute([
        'id' => $id,
        'status' => $status
    ]);
}