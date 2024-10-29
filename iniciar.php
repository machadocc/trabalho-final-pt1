<?php require 'backend/conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Dispositivo - HRAV</title>
    <link rel="stylesheet" href="css/iniciar.css">
</head>
<body>
    <div class="container">
        <h1>Selecione um Dispositivo</h1>

        <form action="index.php" method="GET">
    <label for="dispositivo">Dispositivo:</label>
    <select name="id_dispositivo" id="dispositivo" required>
        <?php
        // Carregar dispositivos do banco de dados
        $query = $conexao->query("SELECT * FROM dispositivos WHERE status = TRUE");
        $dispositivos = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dispositivos as $dispositivo) {
            echo "<option value=\"{$dispositivo['id']}\">{$dispositivo['nome']}</option>";
        }
        ?>
    </select>
    <button type="submit">Iniciar Avaliação</button>
</form>
    </div>
</body>
</html>
