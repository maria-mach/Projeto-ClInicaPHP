<?php
require_once __DIR__ . '/../conexao.php';

function inserir_servico(
    string $nome,
    string $categoria,
    string $descricao,
    float $preco,
    string $imagem
): bool {
    global $conexao;

    $sql = 'INSERT INTO servicos 
            (nome, categoria, descricao, preco, imagem)
            VALUES 
            (:nome, :categoria, :descricao, :preco, :imagem)';

    $stmt = $conexao->prepare($sql);

    return $stmt->execute([
        'nome' => $nome,
        'categoria' => $categoria,
        'descricao' => $descricao,
        'preco' => $preco,
        'imagem' => $imagem
    ]);
}

function listar_servicos_ativos(): array
{
    global $conexao;

    $sql = "SELECT id, nome, categoria, descricao, preco, imagem
            FROM servicos
            WHERE status = 'ativo'
            ORDER BY criado_em DESC";

    $stmt = $conexao->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function listar_servicos_por_categoria(string $categoria): array
{
    global $conexao;

    $sql = "SELECT id, nome, categoria, descricao, preco, imagem
            FROM servicos
            WHERE status = 'ativo'
            AND categoria = :categoria
            ORDER BY criado_em DESC";

    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        'categoria' => $categoria
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function nome_categoria(string $categoria): string
{
    return match ($categoria) {
        'consulta' => 'Consulta',
        'exame' => 'Exame',
        'cirurgia' => 'Cirurgia',
        default => ucfirst($categoria),
    };
}

function listar_todos_servicos(): array
{
    global $conexao;

    $sql = "SELECT
                id,
                nome,
                categoria,
                descricao,
                preco,
                imagem,
                status
            FROM servicos
            ORDER BY criado_em DESC";

    $stmt = $conexao->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function alterar_status_servico(int $id, string $status): bool
{
    global $conexao;

    $sql = "UPDATE servicos
            SET status = :status
            WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    return $stmt->execute([
        'id' => $id,
        'status' => $status
    ]);
}

function buscar_servico_por_id(int $id): ?array
{
    global $conexao;

    $sql = "SELECT id, nome, categoria, descricao, preco, imagem, status
            FROM servicos
            WHERE id = :id
            LIMIT 1";

    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);

    $servico = $stmt->fetch(PDO::FETCH_ASSOC);

    return $servico ?: null;
}

function atualizar_servico(
    int $id,
    string $nome,
    string $categoria,
    string $descricao,
    float $preco,
    string $imagem
): bool {
    global $conexao;

    $sql = "UPDATE servicos
            SET nome = :nome,
                categoria = :categoria,
                descricao = :descricao,
                preco = :preco,
                imagem = :imagem
            WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    return $stmt->execute([
        'id' => $id,
        'nome' => $nome,
        'categoria' => $categoria,
        'descricao' => $descricao,
        'preco' => $preco,
        'imagem' => $imagem
    ]);
}

