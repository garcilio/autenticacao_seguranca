<?php
$host = "localhost";
$dbname = "trabalho_seguranca";
$user = "aluno_web";
$pass = "segredo123";

try {
    return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Erro na ligação à base de dados: " . $e->getMessage());
}