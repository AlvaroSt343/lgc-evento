<?php
session_start();
include_once('./databaseconnect.php');

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$taller = $_POST['taller'];

$_SESSION['nombre'] = $nombre;

$sql = "INSERT INTO taller (nombre, telefono, correo, taller)
VALUES ( '$nombre', '$telefono', '$correo', '$taller' )";
if (mysqli_query($conn, $sql)) {

   
    echo'<script type="text/javascript"> window.location.href="../send-mail.php";</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
