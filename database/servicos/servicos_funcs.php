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

function menor_preco_servico_por_categoria(string $categoria): ?float
{
    global $conexao;

    $sql = "SELECT MIN(preco) AS menor_preco
            FROM servicos
            WHERE status = 'ativo'
            AND categoria = :categoria";

    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        'categoria' => $categoria
    ]);

    $menorPreco = $stmt->fetchColumn();

    return $menorPreco !== null ? (float) $menorPreco : null;
}

function preco_a_partir_de(string $categoria): string
{
    $menorPreco = menor_preco_servico_por_categoria($categoria);

    if ($menorPreco === null) {
        return 'Consulte a clínica';
    }

    return 'R$ ' . number_format($menorPreco, 2, ',', '.');
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

function excluir_imagem_servico_upload(?string $imagem): void
{
    if (!$imagem) {
        return;
    }

    $imagemNormalizada = str_replace('\\', '/', $imagem);
    $pastasPermitidas = [
        'uploads/servicos/'
    ];

    $pastaPermitida = false;

    foreach ($pastasPermitidas as $pasta) {
        if (str_starts_with($imagemNormalizada, $pasta)) {
            $pastaPermitida = true;
            break;
        }
    }

    if (!$pastaPermitida) {
        return;
    }

    $caminhoImagem = __DIR__ . '/../../' . $imagemNormalizada;

    if (is_file($caminhoImagem)) {
        unlink($caminhoImagem);
    }
}

