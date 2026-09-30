<?php
session_start();

if (!isset($_SESSION['utilizador'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['sair'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Início</title>
</head>
<body>
    Bem-vindo, <?= htmlspecialchars($_SESSION['utilizador']) ?>!</h2>
    <p>Tens sessão iniciada com sucesso.</p>

    <p><a href="index.php?sair=1">Terminar Sessão</a></p>
</body>
</html>