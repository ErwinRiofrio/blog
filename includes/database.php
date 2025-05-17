<?php
//configurar la conexion ala base de datos 
//cadena de conexion

$host = 'localhost'; //servidor de base de datos 
$usuario = 'root'; //usuario de msql superadminstrador
$contrasena='';
$base_datos ='blog';

//crear conexion ala base de datos utilizando mslqi
$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

//Verificamos si hay un error de conexion
if ($conn->connect_error) {
    die('error de conexion'. $conn->connect_error);
}

$conn->set_charset('utf8');


?>