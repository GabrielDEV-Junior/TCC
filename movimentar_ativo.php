<?php
session_start();

// Proteção de acesso
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

require 'conexao.php';

$msg = '';

// Carrega lista de ativos
$ativos = $pdo->query('SELECT id, nome FROM ativos')->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ativo_id = $_POST['ativo_id'];
    $tipo = $_POST['tipo'];
    $quantidade = $_POST['quantidade'];

    $stmt = $pdo->prepare('INSERT INTO movimentacoes (ativo_id, tipo, quantidade, data) VALUES (:id, :t, :q, NOW())');
    $stmt->execute([
        ':id' => $ativo_id,
        ':t' => $tipo,
        ':q' => $quantidade
    ]);

    $msg = 'Movimentação registrada com sucesso!';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Movimentar Ativo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">
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
    <h1 class="mb-4">Movimentar Ativo</h1>

    <?php if (!empty($msg)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label for="ativo_id" class="form-label">Ativo:</label>
            <select name="ativo_id" id="ativo_id" class="form-select" required>
                <?php foreach ($ativos as $ativo): ?>
                    <option value="<?= $ativo['id'] ?>"><?= htmlspecialchars($ativo['nome']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Movimentação:</label>
            <select name="tipo" id="tipo" class="form-select" required>
                <option value="entrada">Entrada</option>
                <option value="saida">Saída</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
