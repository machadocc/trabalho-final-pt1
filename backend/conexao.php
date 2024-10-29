<?php
$host = 'localhost';
$db = 'avaliacao_hospital'; // nome do banco de dados
$user = 'postgres'; // usuário do banco de dados
$pass = 'root'; // senha do banco de dados

try {
    $conexao = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
