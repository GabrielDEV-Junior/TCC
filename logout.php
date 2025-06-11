<?php
session_start();
session_destroy();

// Redireciona para a tela de login
header('Location: login.php');
exit;
?>