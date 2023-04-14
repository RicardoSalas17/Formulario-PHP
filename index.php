<?php

require("mail.php");
function validate($name, $email, $subject, $message, $form)
{
    return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
}
$status = "";
if (isset($_POST["form"])) {
    if (validate(...$_POST)) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        $body="
         <br>
         <br>
        Nombre: $name
         <br>
         <br>
         E-mail:  $email 
         <br>
         <br>
        Te envia el siguiente mensaje: 
        <br>
        <br>
        $message
        ";
        //Mandar el Correo
        sendMail($subject,$body,$email,$name, true);
        $status = "success";
    } else {
        $status = "danger";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/7f6d17e882.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulario de Contacto con PHP</title>
</head>

<body class="body-style">
    <?php if ($status == "success") : ?>
        <div class="status-message success">
            <span>Mensaje enviado</span>
        </div>
    <?php endif; ?>
    <?php if ($status == "danger") : ?>
        <div class="status-message error">
            <span>Surgió un problema</span>
        </div>
    <?php endif; ?>

    <form action="./" method="post" class="form-style">
        <h1>Contactame! </h1>
        <div class="input-container">
            <label class="label-style" for="name">Nombre:</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="input-container">
            <label class="label-style" for="email">Correo:</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="input-container">
            <label class="label-style" for="subject">Asunto:</label>
            <input type="text" name="subject" id="subject">
        </div>
        <div class="input-container">
            <label class="label-style" for="message">Mensaje:</label>
            <textarea type="text" name="message" id="message"></textarea>
        </div>
        <div>
            <button name="form" type="submit">Enviar</button>
        </div>
        <div class="contact-container">
            <div class="contact-info">
                <i class="fa-regular fa-location-dot style-icon"></i>
                <span>Avenida Viznaga,Queretaro.</span>
            </div>
            <div class="contact-info">
                <span>55-39-96-33-12</span>
            </div>
        </div>
    </form>
</body>
</html>