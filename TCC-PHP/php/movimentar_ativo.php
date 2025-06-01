<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ativo_id = $_POST['ativo_id'];
    $destino = $_POST['destino'];

    $sql = "INSERT INTO movimentacoes (ativo_id, destino) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $ativo_id, $destino);
    $stmt->execute();

    $msg = "Movimentação registrada!";
}

$ativos = $conn->query("SELECT * FROM ativos");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Movimentação de Ativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Movimentação de Ativo</h2>

    <?php if(isset($msg)): ?>
        <div class="alert alert-success"><?= $msg ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Ativo:</label>
            <select name="ativo_id" class="form-select">
                <?php while($row = $ativos->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nome'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Destino:</label>
            <input type="text" name="destino" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Movimentação</button>
        <a href="index.php" class="btn btn-link">Voltar</a>
    </form>
</div>

</body>
</html>
