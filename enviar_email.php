<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $email = $_POST['email'];
  $mensagem = $_POST['mensagem'];
  
  $to = 'elielviscardis.geo@gmail.com';
  $subject = 'Mensagem de ' . $nome;
  $body = "Nome: $nome\nSobrenome: $sobrenome\nEmail: $email\nMensagem: $mensagem";
  
  if (mail($to, $subject, $body)) {
    echo 'Email enviado com sucesso!';
  } else {
    echo 'Erro ao enviar email.';
  }
}
?>
