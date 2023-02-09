<?php
session_start();

$nombre = $_SESSION['nombre'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = false;
    $mail->isSMTP();
    $mail->Host       = 'smtp.ionos.mx;';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'weeding@dany-wero.com';
    $mail->Password   = 'Weeding#2022*+';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom('weeding@dany-wero.com', 'Danny & Wero');
    $mail->addAddress('alsato.650cc@gmail.com', 'Alvaro2');

    $mail->isHTML(true);
    $mail->Subject = 'Nuevo mensaje de contacto / ' . $asunto;

    $mail->Body    = '     <html> 
         <head> 
            <title>TALLER DE REFORMAS FISCALES - LGC</title> 
         </head> 
         <body style="background: #edd27d; color: white; padding: 15px;"> 
             <h4>TALLER DE REFORMAS FISCALES - LGC</h4> 
             <p>
                 Hola ' . $nombre . ', gracias por confirmar tu asistencia al TALLER DE REFORMAS FISCALES.
             </p>    
             <p>
                 Datos para depositos a nombre de: <br><br>
                 <b>
                     Inteligencia Legal Fiscal e Inmobiliaria LGC, S. DER.L.
                 </b>
             </p>
             <p>
                 RFC: ILF120821CV0
                 <br>
                 CLABE: 072 180 010 9554 3728 4
                 <br>
                 CTA: 1095543728
                 <br>
                 <br>
                 Enviar comprobante de pago y costancia de situacion fiscal al correo susana.castro@iinfilgc.com
                 <br>
                 <br>
             </p>
             <img src="https://sitio-test.com/eventolgc/assets/info-1.jpeg">
            
             <br><br><br>
             <p>
                 Si tienes dudas, escanea el codigo qr para mas información.
             </p>
             <center>
                 <img src="https://sitio-test.com/eventolgc/assets/qr.png">
             <center>
         </body> 
         </html>';

    $mail->send();
    echo "Mail has been sent successfully!";
    echo '<script type="text/javascript"> window.location.href="./gracias.php";</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}