document.addEventListener('DOMContentLoaded', function () {
    const botaoProximo = document.getElementById('botao-proximo');
    const perguntas = document.querySelectorAll('.pergunta');
    let perguntaAtual = 0;

    botaoProximo.addEventListener('click', () => {
        const perguntaAtualDiv = perguntas[perguntaAtual];
        const respostaSelecionada = perguntaAtualDiv.querySelector('input[type="radio"]:checked');

        if (!respostaSelecionada) {
            alert('Por favor, selecione uma resposta.');
            return;
        }
        perguntaAtualDiv.style.display = 'none';
        perguntaAtual++;

        if (perguntaAtual < perguntas.length) {
            perguntas[perguntaAtual].style.display = 'block';
        } else {
            document.getElementById('form-avaliacao').submit();
        }
    });
});
