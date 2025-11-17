document.getElementById('torcedorForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Impede o envio padrão

    const nome = document.getElementById('nome').value.trim();
    const idade = document.getElementById('idade').value;
    const celular = document.getElementById('celular').value.trim();
    const time = document.getElementById('time').value.trim();
    const socio = document.querySelector('input[name="socio"]:checked');
    const sms = document.querySelector('input[name="sms"]:checked');
    const frequencia = document.getElementById('frequencia').value;

    // Validação simples de celular (padrão brasileiro)
    const celularRegex = /^\(\d{2}\) \d{4,5}-\d{4}$/;
    if (!celularRegex.test(celular)) {
        alert("Digite o celular no formato (99) 99999-9999");
        return;
    }

    // Verifica se tudo está preenchido
    if (!nome || !idade || !celular || !time || !socio || !sms || !frequencia) {
        alert("Por favor, preencha todos os campos.");
        return;
    }

    // Mostra mensagem de sucesso
    document.getElementById('mensagem').textContent = "✅ Formulário enviado com sucesso!";
    document.getElementById('mensagem').style.color = "#1b5e20";

    // Reseta o formulário após envio
    document.getElementById('torcedorForm').reset();
});
