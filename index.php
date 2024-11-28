<?php

require 'backend/conexao.php';

$id_dispositivo = $_GET['id_dispositivo'] ?? null;

if (!$id_dispositivo) {
    die("Dispositivo não selecionado.");
}

$query = $conexao->prepare("SELECT * FROM perguntas WHERE dispositivo_id = ? AND status = TRUE");
$query->execute([$id_dispositivo]);
$perguntas = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação de Serviços - HRAV</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="js/script.js" defer></script>
</head>

<body>
<div id="tela-inicial" class="tela-inicial">
    <img class="logo" src="http://www.hrav.com.br/wp-content/uploads/2024/08/logo.png" alt="Logo HRAV">
    <h1>Bem-vindo(a) à Avaliação de Serviços</h1>
    <p>Clique na tela para iniciar sua avaliação.</p>
</div>
    
    <div class="container">
        <img class="logo" src="http://www.hrav.com.br/wp-content/uploads/2024/08/logo.png" alt="logo-hospital">
        <h1>Avaliação de Serviços - HRAV</h1>

        <form id="form-avaliacao" action="backend/salvar_avaliacao.php" method="POST">
            <input type="hidden" name="id_dispositivo" value="<?php echo $id_dispositivo; ?>">
            <div id="avaliacao-container">
                <?php foreach ($perguntas as $index => $pergunta): ?>
                    <div class="pergunta" id="pergunta-<?php echo $index; ?>"
                        style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>;">
                        <h2><?php echo $pergunta['texto']; ?></h2>
                        <input type="hidden" name="id_pergunta[]" value="<?php echo $pergunta['id']; ?>">

                        <div class="bolinhas">
                            <?php for ($i = 0; $i <= 10; $i++): ?>
                                <label>
                                    <input type="radio" name="resposta[<?php echo $index; ?>]" value="<?php echo $i; ?>"
                                        required>
                                    <span class="bolinha bolinha-<?php echo $i; ?>"><?php echo $i; ?></span>
                                </label>
                            <?php endfor; ?>
                        </div>

                        <div class="feedback">
                            <label>Deixe seu feedback (opcional):</label>
                            <textarea name="feedback[<?php echo $index; ?>]" rows="3"
                                placeholder="Digite seu comentário..."></textarea>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="button" id="botao-proximo">Próximo</button>
            <button type="submit" id="botao-enviar" style="display: none;">Enviar</button>
        </form>


        <footer>
            <p>Sua avaliação é anônima. Nenhuma informação pessoal será coletada.</p>
        </footer>
    </div>
</body>

</html>