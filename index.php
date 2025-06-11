<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

require 'conexao.php';

// Consulta para pegar os últimos 5 ativos cadastrados
$ativos = $pdo->query('SELECT * FROM ativos ORDER BY id DESC LIMIT 5')->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel de Controle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Gestão de Ativos</a>
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

<div class="container mt-5 text-center">
    <div class="card p-4 shadow">
        <h1 class="mb-4">Bem-vindo, <?= htmlspecialchars($_SESSION['usuario']) ?>!</h1>

        <div class="d-flex justify-content-center gap-3">
            <a href="cadastro_ativo.php" class="btn btn-primary">Cadastro de Ativo</a>
            <a href="movimentacao.php" class="btn btn-secondary">Movimentação</a>
            <a href="relatorios.php" class="btn btn-success">Relatórios</a>
        </div>
    </div>

    <div class="mt-5">
        <h2>Últimos Ativos Cadastrados</h2>

        <?php if (!empty($ativos)): ?>
            <table class="table table-striped table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ativos as $ativo): ?>
                        <tr>
                            <td><?= htmlspecialchars($ativo['nome']) ?></td>
                            <td><?= htmlspecialchars($ativo['descricao']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-muted mt-3">Nenhum ativo cadastrado ainda.</p>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
