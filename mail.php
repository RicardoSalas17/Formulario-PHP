<?php 

require("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;

function sendMail($subject,$body,$email,$name,$html=false){
//Configuracion inicial del servidor de correos
$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = 'b5035976603c7f';
$phpmailer->Password = '4565155297b121';

//añadiendo destinatarios
$phpmailer->setFrom('contact@contact.com', 'Mi empresa');
$phpmailer->addAddress($email, $name);

//Definiendo contenido
$phpmailer->isHTML($html);                                  //Set email format to HTML
$phpmailer->Subject = $subject;
$phpmailer->Body    = $body;

//Mandar el correo
$phpmailer->send();

}

?>