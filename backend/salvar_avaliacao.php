<?php
require 'conexao.php';
$id_dispositivo = $_POST['id_dispositivo']; // Variavel para capturar ID

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = $conexao->prepare("INSERT INTO avaliacoes (id_pergunta, resposta, feedback) VALUES (?, ?, ?)");

    for ($i = 0; $i < count($_POST['id_pergunta']); $i++) {
        $id_pergunta = $_POST['id_pergunta'][$i];
        $resposta = $_POST['resposta'][$i];
        $feedback = isset($_POST['feedback'][$i]) ? $_POST['feedback'][$i] : null;

        $query->execute([$id_pergunta, $resposta, $feedback]);
    }

    // Redirecionar para a tela de agradecimento passando o ID do dispositivo
    header("Location: ../agradecimento.php?id_dispositivo={$id_dispositivo}");
    exit;
} else {
    header("Location: ../index.php");
    exit;
}
?>
