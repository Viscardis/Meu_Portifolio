<?php
// Importe a classe PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Configure as informações de email
$to = 'seu_email@gmail.com'; // Endereço de email para o qual o email será enviado
$subject = 'Mensagem do formulário de contato'; // Assunto do email

// Obtenha os dados do formulário
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

// Construa o corpo do email
$body = "Nome: $nome\nSobrenome: $sobrenome\nEmail: $email\nMensagem:\n$mensagem";

// Crie uma nova instância do PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurar o servidor SMTP
    $mail->SMTPDebug = 0; // Ative a saída de depuração detalhada
    $mail->isSMTP(); // Use o protocolo SMTP
    $mail->Host = 'smtp.gmail.com'; // Endereço do servidor SMTP
    $mail->SMTPAuth = true; // Ative a autenticação SMTP
    $mail->Username = 'elielviscardis.geo@gmail.com'; // Endereço de email do remetente
    $mail->Password = 'Eu81511056eu'; // Senha do remetente
    $mail->SMTPSecure = 'tls'; // Ative a segurança TLS
    $mail->Port = 587; // Porta SMTP para usar

    // Definir as informações do remetente e destinatário
    $mail->setFrom($email, $nome);
    $mail->addAddress($to);

    // Definir o assunto e corpo do email
    $mail->Subject = $subject;
    $mail->Body    = $body;

    // Enviar o email
    $mail->send();
    echo 'Mensagem enviada com sucesso';
} catch (Exception $e) {
    echo 'Erro ao enviar mensagem: ', $mail->ErrorInfo;
}
?>

