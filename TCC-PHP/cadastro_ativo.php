<?php
session_start();

// Proteção de acesso
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

require 'conexao.php';

$msg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    $stmt = $pdo->prepare('INSERT INTO ativos (nome, descricao) VALUES (:n, :d)');
    $stmt->execute([
        ':n' => $nome,
        ':d' => $descricao
    ]);

    $msg = 'Ativo cadastrado com sucesso!';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Ativo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index.php">Gestão de Ativos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
        <li class="nav-item"><a class="nav-link" href="cadastro_usuario.php">Cadastrar Usuário</a></li>
        <li class="nav-item"><a class="nav-link" href="cadastro_ativo.php">Cadastrar Ativo</a></li>
        <li class="nav-item"><a class="nav-link" href="listar_ativos.php">Listar Ativos</a></li>
        <li class="nav-item"><a class="nav-link" href="relatorios.php">Relatórios</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <h1 class="mb-4">Cadastro de Ativo</h1>

    <?php if (!empty($msg)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Ativo:</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <!-- ✅ Botão de voltar para o Início -->
    <div class="mt-3">
        <a href="index.php" class="btn btn-outline-secondary">Voltar para Início</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
