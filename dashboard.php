<?php require 'backend/conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Avaliação - HRAV</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Dashboard de Avaliação</h1>

        <?php
        $queryMedia = $conexao->query("
            SELECT id_pergunta, perguntas.texto, AVG(resposta) AS media_resposta
            FROM avaliacoes
            JOIN perguntas ON
  	             avaliacoes.id_pergunta = perguntas.id
            GROUP BY id_pergunta, perguntas.texto
            ORDER BY id_pergunta
        ");
        $mediaAvaliacoes = $queryMedia->fetchAll(PDO::FETCH_ASSOC);

        $queryFeedback = $conexao->query("
            SELECT p.texto AS pergunta_texto, a.feedback
            FROM avaliacoes a
            JOIN perguntas p ON a.id_pergunta = p.id
            WHERE a.feedback IS NOT NULL AND a.feedback != ''
        ");
        $feedbacks = $queryFeedback->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <h2>Média das Avaliações por Pergunta</h2>
        <table>
            <thead>
                <tr>
                    <th>Pergunta</th>
                    <th>Média da Avaliação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mediaAvaliacoes as $media): ?>
                    <tr>
                    <td><?php echo "Pergunta " . htmlspecialchars($media['id_pergunta']) . ": " . htmlspecialchars($media['texto']); ?></td>

                        <td><?php echo number_format($media['media_resposta'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Feedbacks Recebidos</h2>
        <ul>
            <?php foreach ($feedbacks as $feedback): ?>
                <li><strong><?php echo htmlspecialchars($feedback['pergunta_texto']); ?></strong>: <?php echo htmlspecialchars($feedback['feedback']); ?></li>
            <?php endforeach; ?>
        </ul>

    </div>
</body>
</html>
