<?php
include_once('./databaseconnect.php');

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$taller = $_POST['taller'];

$sql = "INSERT INTO taller (nombre, telefono, correo, taller)
VALUES ( '$nombre', '$telefono', '$correo', '$taller' )";
if (mysqli_query($conn, $sql)) {

    // envia mail
    $asunto = "TALLER DE REFORMAS FISCALES - LGC";

    $destinatario = $correo;
    $cuerpo = ' 
        <html> 
        <head> 
           <title>TALLER DE REFORMAS FISCALES - LGC</title> 
        </head> 
        <body> 
            <h4>TALLER DE REFORMAS FISCALES - LGC</h4> 
            <p>
                Hola ' . $nombre . ', gracias por confirmar tu asistencia al TALLER DE REFORMAS FISCALES.
            </p>    
            <p>
                Datos para depositos a nombre de: <br><br>
                <b>
                    Inteligencia Legal Fiscal e Inmobiliaria LGC, S. DER.L.
                </b>
                <br>
            </p>
                RFC: ILF120821CV0
                <br>
                CLABE: 072 180 010 9554 3728 4
                <br>
                CTA: 1095543728
                <br>
                <br>
                Enviar comprobante de pago y costancia de situacion fiscal al correo susana.castro@iinfilgc.com
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
    header('Location: ./gracias.html|');



    echo ("<script>location.href='../confirma-pago.php';</script>");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
