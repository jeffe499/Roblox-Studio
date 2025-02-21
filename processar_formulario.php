<?php
// Função para validar e limpar os dados de entrada
function limpar_input($data) {
    // Remove espaços extras, tags HTML e converte caracteres especiais
    return htmlspecialchars(trim($data));
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios estão preenchidos
    if (isset($_POST['nome'], $_POST['email'], $_POST['mensagem'])) {
        // Limpa os dados do formulário
        $nome = limpar_input($_POST['nome']);
        $email = limpar_input($_POST['email']);
        $mensagem = limpar_input($_POST['mensagem']);

        // Verifica se o e-mail está em um formato válido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Por favor, insira um e-mail válido!'); window.history.back();</script>";
            exit;
        }

        // Configurações do e-mail
        $assunto = "Novo Contato do Formulário";
        $corpo_mensagem = "
        <html>
        <head>
            <title>Mensagem de Contato</title>
        </head>
        <body>
            <h2>Detalhes do Contato</h2>
            <p><strong>Nome:</strong> $nome</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Mensagem:</strong></p>
            <p>$mensagem</p>
        </body>
        </html>
        ";

        // Cabeçalhos do e-mail
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: $email" . "\r\n";
        $headers .= "Reply-To: $email" . "\r\n";

        // E-mail para enviar
        $email_destino = "jefferson.kreiner@escola.pr.gov.br"; // Substitua pelo seu e-mail real

        // Envia o e-mail
        if (mail($email_destino, $assunto, $corpo_mensagem, $headers)) {
            echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href = 'index.html';</script>";
        } else {
            echo "<script>alert('Ocorreu um erro ao enviar sua mensagem. Tente novamente.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Por favor, preencha todos os campos do formulário.'); window.history.back();</script>";
    }
} else {
    // Se o formulário não foi enviado corretamente
    echo "<script>alert('Método de envio inválido!'); window.history.back();</script>";
}
?>
