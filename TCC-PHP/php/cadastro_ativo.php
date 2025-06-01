<?php session_start(); if (!isset($_SESSION['usuario'])) { header("Location: login.php"); exit(); } ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Ativo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2 class="mb-4">Cadastro de Ativo</h2>

  <form action="cadastro_ativo.php" method="POST">
    <div class="mb-3">
      <label>Nome do Ativo:</label>
      <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Descrição:</label>
      <textarea name="descricao" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="index.php" class="btn btn-link">Voltar</a>
  </form>
</div>

</body>
</html>