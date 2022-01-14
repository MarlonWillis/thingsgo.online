<?php
if(isset($_POST["action"])) {
	$nome = $_POST['nome'];                 // Sender's name
	$email = $_POST['email'];     // Sender's email address
	$telefone  = $_POST['telefone'];     // Sender's email address
	$message = $_POST['message'];    // Sender's message
	$from = 'COSOLAR';
	$to = 'Demo@domian.com';     // Recipient's email address
	$subject = 'Message from Contact Demo ';

	//$body = " From: $name \n E-Mail: $email \n Phone : $phone \n Message : $message"  ;
	$body = "From: $nome \n";
  	$body.= "E-Mail: $email \n";
	$body.= "telefone : $phone \n";
	$body.= "Message : $message \n";

	// init error message
	$errmsg='';
	// Check if name has been entered
	if (!$_POST['name']) {
		$errmsg .= 'Please enter your name'."<br>";
	}


	/* Check required field not blank */

	// Check if email has been entered and is valid
	if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errmsg .= 'Insira um e-mail valido'."<br>";
	}

	//Check if message has been entered
	if (!$_POST['message']) {
		$errmsg .= 'Escreva sua mensagem'."<br>";
	}

	$result='';
	// If there are no errors, send the email
	if (!$errmsg) {
		if (mail ($to, $subject, $body, $from)) {
			$result='<div class="alert alert-success">Obrigado por entrar em contato. Sua mensagem foi enviada com sucesso. Entraremos em contato o mais breve possivel!</div>';
		}
		else {
		  $result='<div class="alert alert-danger">Desculpe, houve um erro ao mandar sua mensagem. Tente novamente mais tarde.</div>';
		}
	}
	else{
		$result='<div class="alert alert-danger">'.$errmsg.'</div>';
	}
		echo $result;
	}
?>
