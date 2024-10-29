<?php require 'backend/conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agradecimento - HRAV</title>
    <link rel="stylesheet" href="css/agradecimento.css">
</head>
<body>
    <div class="container">
        <h1>Avaliação de Serviços - HRAV</h1>
        <h2>O Hospital Regional Alto Vale (HRAV) agradece sua resposta e ela é muito importante para nós, pois nos ajuda a melhorar continuamente nossos serviços.</h2>
        <p id="contagem-regressiva">Você será redirecionado em <span id="tempo">10</span> segundos.</p>
    </div>

    <script>
    let tempo = 10;
    const tempoElement = document.getElementById('tempo');
    const idDispositivo = "<?php echo $_GET['id_dispositivo']; ?>"; // Capturando o ID do dispositivo da URL

    const countdown = setInterval(() => {
        tempo--;
        tempoElement.textContent = tempo;

        if (tempo <= 0) {
            clearInterval(countdown);
            window.location.href = 'index.php?id_dispositivo=' + idDispositivo; // Redireciona com o ID do dispositivo
        }
    }, 1000);
</script>

</body>
</html>
