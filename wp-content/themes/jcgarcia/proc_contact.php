<?php

require_once('inc/class.phpmailer.php');

$username = htmlentities($_POST['username']);
$email = htmlentities($_POST['email']);
$message = htmlentities($_POST['message']);

//html body
$body = "<h3>Mensaje de: " . $username . "</h3>";
$body .= "Nombre: " . $username;
$body .= "<br>Email: " . $email;
$body .= "<br>Mensaje: " . $message;
$body .= "<br><br><br>www.juancarlosangustia.com";

//alt text body
$alt = "Mensaje de: " . $username . "\n\n";
$alt .= "Nombre: " . $username;
$alt .= "\nEmail: " . $email;
$alt .= "\nMensaje: " . $message;
$alt .= "\n\n\nwww.juancarlosangustia.com";

//send email :)
$mail = new PHPMailer();
$mail->From = $email;
$mail->FromName = $username;
$mail->AddAddress('jonathantorres41@gmail.com', 'Jonathan Torres');
$mail->AddAddress('jc.angustia@gmail.com', 'Juan Carlos Garcia');
$mail->AddReplyTo($email, $username);
			
$mail->IsHTML(true);
$mail->Subject = 'Mensaje de: ' . $username;
$mail->MsgHTML($body);
$mail->AltBody = $alt;
$mail->Send();

header('Location: http://www.juancarlosangustia.com');

?>