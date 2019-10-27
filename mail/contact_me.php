<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "focanainternetbr@gmail.com";
$subject = "Mensagem Enviada Pelo Site:  $name";
$body = "Você recebeu uma nova mensagem.\n\n"."Seguem as informações:\n\nNome: $name\n\nE-mail: $email\n\nTelefone: $phone\n\nMensagem:\n$message";
$header = "From: noreply@focanainternet.com.br\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";	

if(mail($to, $subject, $body, $header)){

  echo("E-mail enviado com sucesso!");
}else{
  echo("Ocorreu um erro, tente novamente!");
}
?>
