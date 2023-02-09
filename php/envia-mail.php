<?php
//FORM DE CONTACTO


$nombre = $_POST["elnombre"];
$correo = $_POST["elcorreo"];
$asunto = $_POST["elasunto"];
$mensaje = $_POST["elmensaje"];



$destinatario = 'eduardoest@gmail.com';
$asunto = $asunto;
$cuerpo = ' 
    <html> 
    <head> 
       <title>¡Nuevo contacto!</title> 
    </head> 
    <body> 
    <h4>¡Nuevo contacto!</h4> 
    <p> 
    <b>Nombre: </b> ' . $nombre . ' <br>
    <b>Correo: </b> ' . $correo . ' <br>
    <b>Asunto: </b> ' . $asunto . ' <br>
    <b>Mensaje: </b> <br> ' . $mensaje . '
    </p> 
    </body> 
    </html> 
    ';

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";

//dirección del remitente 
$headers .= "From: " . $nombre . " <" . $correo . ">\r\n";

mail($destinatario, $asunto, $cuerpo, $headers);


sleep(2);
header('Location: ./index.php');

?>
