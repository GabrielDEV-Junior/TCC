<?php
session_start();

// Proteção de acesso
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

require 'conexao.php';

// Consulta aos ativos
$ativos = $pdo->query('SELECT * FROM ativos')->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar Ativos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="./style.css">
</head>
<body class="bg-light">

<!-- Navbar -->
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

<!-- Conteúdo principal -->
<div class="container mt-5">
    <h1 class="mb-4">Lista de Ativos</h1>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($ativos as $ativo): ?>
                <tr>
                    <td><?= $ativo['id'] ?></td>
                    <td><?= htmlspecialchars($ativo['nome']) ?></td>
                    <td><?= htmlspecialchars($ativo['descricao']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
