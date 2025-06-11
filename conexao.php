<?php
// Configurações do banco de dados
$host = 'localhost';
$db   = 'banco';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opções para o PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lança exceções em erros
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Retorna como array associativo
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Usa prepared statements reais
];

try {
    // Cria a conexão PDO
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // Em caso de erro, exibe mensagem e encerra
    exit('Erro na conexão: ' . $e->getMessage());
}
?>
