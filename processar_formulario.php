<?php
// Verifica se o método de envio é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Configurações do e-mail
    $para = "jefferson.kreiner@gmail.com"; // E-mail para onde a mensagem será enviada
    $assunto = "Novo contato do formulário Tropicália";

    // Corpo do e-mail
    $corpoMensagem = "Você recebeu uma nova mensagem do formulário de contato.\n\n";
    $corpoMensagem .= "Nome: $nome\n";
    $corpoMensagem .= "Email: $email\n";
    $corpoMensagem .= "Mensagem: $mensagem\n";

    // Cabeçalhos do e-mail
    $cabecalhos = "From: $email\r\n";
    $cabecalhos .= "Reply-To: $email\r\n";
    $cabecalhos .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envia o e-mail
    if (mail($para, $assunto, $corpoMensagem, $cabecalhos)) {
        // Caso o e-mail tenha sido enviado com sucesso
        echo "Mensagem enviada com sucesso!";
    } else {
        // Caso o envio do e-mail tenha falhado
        echo "Ocorreu um erro ao enviar sua mensagem. Por favor, tente novamente mais tarde.";
    }
} else {
    // Se o formulário não foi enviado via POST
    echo "Método inválido de envio.";
}
?>
