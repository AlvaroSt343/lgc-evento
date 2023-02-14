<?php

session_start();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once('./php/databaseconnect.php');

$nombre = $_REQUEST['nombre'];
$telefono = $_REQUEST['telefono'];
$correo = $_REQUEST['correo'];
$taller = $_REQUEST['taller'];

$sql = "INSERT INTO taller (nombre, telefono, correo, taller)
VALUES ( '$nombre', '$telefono', '$correo', '$taller' )";
if (mysqli_query($conn, $sql)) {


    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = true;
        $mail->isSMTP();
        $mail->Host = 'mail.sitio-test.com';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'noreply@sitio-test.com';
        $mail->Password = 'LGC#2023*+';
        $mail->SMTPSecure = 'ssl';


        $mail->setFrom('no-replay@lgc.com', 'LGC');
        $mail->addAddress('alsato.650cc@gmail.com', 'Alvaro2');

        $mail->isHTML(true);
        $mail->Subject = 'TALLER DE REFORMAS FISCALES - LGC';

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
                    Si tienes dudas, escanea el codigo qr para mas informacion.
                </p>
                <center>
                    <img src="https://sitio-test.com/eventolgc/assets/qr.png">
                <center>
            </body> 
            </html>';

        $mail->send();
        $var = "Mensaje enviado correctamente";
        echo "<script> alert('" . $var . "'); </script>";
        sleep(2);
        echo("<script>window.location = 'index.html';</script>");
    } catch (Exception $e) {
        $var = "Error";
        echo "<script> alert('" . $var . "'); </script>";
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
