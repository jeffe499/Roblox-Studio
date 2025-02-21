// Função para validar os campos do formulário
function validarFormulario() {
    // Obtém os valores dos campos
    const nome = document.getElementById("nome").value.trim();
    const email = document.getElementById("email").value.trim();
    const mensagem = document.getElementById("mensagem").value.trim();

    // Verifica se o nome foi preenchido
    if (nome === "") {
        alert("Por favor, insira seu nome.");
        return false;
    }

    // Verifica se o e-mail foi preenchido e é válido
    if (email === "") {
        alert("Por favor, insira seu e-mail.");
        return false;
    } else if (!validarEmail(email)) {
        alert("Por favor, insira um e-mail válido.");
        return false;
    }

    // Verifica se a mensagem foi preenchida
    if (mensagem === "") {
        alert("Por favor, insira uma mensagem.");
        return false;
    }

    // Se tudo estiver válido, o formulário pode ser enviado
    return true;
}

// Função para validar o formato do e-mail
function validarEmail(email) {
    const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return regex.test(email);
}

// Adiciona o evento de submit ao formulário
document.getElementById("form-contato").addEventListener("submit", function(event) {
    // Se a validação falhar, impede o envio do formulário
    if (!validarFormulario()) {
        event.preventDefault(); // Impede o envio
    } else {
        // Mensagem de sucesso ou erro pode ser exibida antes do envio real.
        alert("Formulário enviado com sucesso!");
    }
});
