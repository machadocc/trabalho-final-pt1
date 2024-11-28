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

let inatividadeTimeout;
const tempoInatividade = 30000;

function resetarInatividade() {
    if (document.getElementById('avaliacao-container').style.display !== 'none') {
        clearTimeout(inatividadeTimeout);
        inatividadeTimeout = setTimeout(() => {
            location.reload();
        }, tempoInatividade);
    }
}

document.addEventListener("mousemove", resetarInatividade);
document.addEventListener("keydown", resetarInatividade);
document.addEventListener("click", resetarInatividade);
document.addEventListener("touchstart", resetarInatividade);

document.addEventListener('DOMContentLoaded', () => {
    const telaInicial = document.getElementById('tela-inicial');
    const container = document.querySelector('.container');
    const avaliacaoContainer = document.getElementById('avaliacao-container');

    telaInicial.addEventListener('click', () => {
        telaInicial.style.display = 'none';
        container.style.display = 'block';
        avaliacaoContainer.style.display = 'block';

        resetarInatividade();
    });
});
