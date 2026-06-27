<?php
// Configuração do banco de dados para XAMPP + MySQL

// Dados de conexão (ajuste conforme seu servidor)
$host = 'localhost';
$usuario_db = 'root';
$senha_db = '';
$banco = 'clinica';

try {
    // Conexão PDO
    $conexao = new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8",
        $usuario_db,
        $senha_db,
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        )
    );
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
