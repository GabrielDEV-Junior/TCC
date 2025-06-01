<?php session_start(); if (!isset($_SESSION['usuario'])) { header("Location: login.php"); exit(); } ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Relatórios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2 class="mb-4">Relatórios</h2>

  <form action="relatorios.php" method="GET">
    <div class="mb-3">
      <label>Filtro:</label>
      <input type="text" name="filtro" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Gerar Relatório</button>
    <a href="index.php" class="btn btn-link">Voltar</a>
  </form>
</div>

</body>
</html>