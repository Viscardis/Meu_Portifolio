<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $email = $_POST['email'];
  $mensagem = $_POST['mensagem'];
  
  $para= 'elielviscardis.geo@gmail.com';
  $assunto = 'Mensagem de ' . $nome;
  $body = "Nome: $nome\nSobrenome: $sobrenome\nEmail: $email\nMensagem: $mensagem";
  
  $mensagem_email = "Você recebeu uma nova mensagem do formulário de contato:\n\n";
$mensagem_email .= "Nome: " . $nome . "\n";
$mensagem_email .= "Sobrenome: " . $sobrenome . "\n";
$mensagem_email .= "E-mail: " . $email . "\n\n";
$mensagem_email .= "Mensagem:\n" . $mensagem;

// Envia o e-mail
mail($para, $assunto, $mensagem_email, $headers);

// Redireciona o usuário de volta para o formulário
header('Location: formulario.php?enviado=true');
exit;
?>
