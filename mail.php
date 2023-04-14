<?php 

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
function sendMail($subject,$body,$email,$name,$html=false){
//Configuracion inicial del servidor de correos
$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'smtp.gmail.com';
$phpmailer->SMTPAuth = true;
$phpmailer->SMTPSecure =PHPMailer::ENCRYPTION_SMTPS; 
$phpmailer->Port = 465;
$phpmailer->Username = $_ENV['USEREMAIL'];
$phpmailer->Password = $_ENV['USERKEY'];
//añadiendo destinatarios
$phpmailer->setFrom('contact@contact.com', 'Mi formulario de PHP');
$phpmailer->addAddress($_ENV['USEREMAIL'], "Ricardo");

//Definiendo contenido
$phpmailer->isHTML($html);                                  //Set email format to HTML
$phpmailer->Subject = $subject;
$phpmailer->Body = $body;

//Mandar el correo
$phpmailer->send();

}

?>