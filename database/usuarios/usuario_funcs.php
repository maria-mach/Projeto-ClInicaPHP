<?php
require_once __DIR__ . '/../conexao.php';

//Utilizado em auth/autenticar.php para buscar o usuário por email.
function buscar_usuario_por_email(string $email): ?array
{
    global $conexao;

    $sql = 'SELECT id, nome, email, senha, tipo, foto FROM usuarios WHERE email = :email LIMIT 1';
    $stmt = $conexao->prepare($sql);
    $stmt->execute(['email' => $email]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    return $usuario ?: null;
}

function listar_clientes_destaque(int $limite = 3): array
{
    global $conexao;

    $sql = "SELECT id, nome, foto
            FROM usuarios
            WHERE tipo = 'cliente'
            ORDER BY RAND()
            LIMIT :limite";

    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscar_usuario_por_id(int $id): ?array
{
    global $conexao;

    $sql = 'SELECT * FROM usuarios WHERE id = :id LIMIT 1';

    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    return $usuario ?: null;
}

function inserir_usuario(
    string $nome,
    string $cpf,
    string $telefone,
    string $email,
    string $senha,
    string $tipo = 'cliente'
): bool
{
    global $conexao;

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO usuarios (
                nome,
                cpf,
                telefone,
                email,
                senha,
                tipo
            ) VALUES (
                :nome,
                :cpf,
                :telefone,
                :email,
                :senha,
                :tipo
            )';

    $stmt = $conexao->prepare($sql);

    return $stmt->execute([
        'nome' => $nome,
        'cpf' => $cpf,
        'telefone' => $telefone,
        'email' => $email,
        'senha' => $senhaHash,
        'tipo' => $tipo
    ]);
}
function atualizar_usuario(
    int $id,
    string $nome,
    string $cpf,
    string $telefone,
    string $email,
    string $cep,
    string $endereco,
    string $numero,
    string $bairro,
    string $cidade,
    string $estado,
    string $foto
): bool {
    global $conexao;

    $sql = 'UPDATE usuarios SET
                nome = :nome,
                cpf = :cpf,
                telefone = :telefone,
                email = :email,
                cep = :cep,
                endereco = :endereco,
                numero = :numero,
                bairro = :bairro,
                cidade = :cidade,
                estado = :estado,
                foto = :foto
            WHERE id = :id';

    $stmt = $conexao->prepare($sql);

    return $stmt->execute([
        'id' => $id,
        'nome' => $nome,
        'cpf' => $cpf,
        'telefone' => $telefone,
        'email' => $email,
        'cep' => $cep,
        'endereco' => $endereco,
        'numero' => $numero,
        'bairro' => $bairro,
        'cidade' => $cidade,
        'estado' => $estado,
        'foto' => $foto
    ]);
}

function excluir_usuario(int $id): bool
{
    global $conexao;

    $sql = 'DELETE FROM usuarios WHERE id = :id';

    $stmt = $conexao->prepare($sql);

    return $stmt->execute(['id' => $id]);
}

function buscar_usuario_por_cpf(string $cpf): ?array
{
    global $conexao;

    $sql = 'SELECT * FROM usuarios WHERE cpf = :cpf LIMIT 1';

    $stmt = $conexao->prepare($sql);
    $stmt->execute(['cpf' => $cpf]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    return $usuario ?: null;
}
