<?php
$pdo = require 'db.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cifra a password com Hash + Salt (Aula 04 e 06)
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepared Statement contra SQL Injection (Aula 03)
    $sql = "INSERT INTO utilizadores (username, password) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$username, $hash]);
        $mensagem = "Conta criada com sucesso! <a href='login.php'>Entrar</a>";
    } catch (Exception $e) {
        $mensagem = "Erro: Este username já existe!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Registo</title>
</head>
<body>
<h2>Criar Conta</h2>
<p><?= $mensagem ?></p>

<form method="POST">
    <label>Utilizador:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Registar</button>
</form>

<p><a href="login.php">Já tem conta? Faça Login</a></p>
</body>
</html>