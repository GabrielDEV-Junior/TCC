<?php
require 'conexao.php';

$sql = "SELECT * FROM ativos";
$stmt = $pdo->query($sql);

$ativos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($ativos);
?>