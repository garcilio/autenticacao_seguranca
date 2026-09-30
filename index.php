<?php
session_start();

// Proteção de Acesso: se não estiver autenticado, vai para o login (Aula 03 / A01)
if (!isset($_SESSION['utilizador'])) {
    header("Location: login.php");
    exit;
}

// Invalidação de sessão no logout (Aula 04 / A07)
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
<!-- htmlspecialchars previne ataques de XSS (Aula 05) -->
<h2>Bem-vindo, <?= htmlspecialchars($_SESSION['utilizador']) ?>!</h2>
<p>Tens sessão iniciada com sucesso.</p>

<p><a href="index.php?sair=1">Terminar Sessão</a></p>
</body>
</html>