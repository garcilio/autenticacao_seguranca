<?php
session_start();
$pdo = require 'db.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM utilizadores WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['utilizador'] = $user['username'];
        header("Location: index.php");
        exit;
    } else {
        $erro = "Utilizador ou password incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h2>Iniciar Sessão</h2>
<?php if ($erro): ?>
    <p style="color: red;"><?= $erro ?></p>
<?php endif; ?>

<form method="POST">
    <label>Utilizador:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Entrar</button>
</form>

<p><a href="registar.php">Não tem conta? Registe-se</a></p>
</body>
</html>