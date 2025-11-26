function previewCarta() {
    // Coleta os dados dos campos do formulário
    document.getElementById('prevRemetente').innerText =
        document.querySelector('[name="remetente"]').value;

    document.getElementById('prevInstituicao').innerText =
        document.querySelector('[name="instituicao"]').value;

    document.getElementById('prevDestinatario').innerText =
        document.querySelector('[name="destinatario"]').value;

    document.getElementById('prevMensagem').innerText =
        document.querySelector('[name="mensagem"]').value;

    // Exibe o modal
    document.getElementById('previewModal').style.display = 'flex';
}

// Função para fechar o modal
function fecharModal() {
    document.getElementById('previewModal').style.display = 'none';
}

// Função para imprimir ou salvar como PDF
function gerarPDF() {
    window.print();
}
