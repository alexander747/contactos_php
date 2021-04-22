<?php
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'contactos';

$conexion = mysqli_connect( $server, $user, $password, $database );

mysqli_set_charset($conexion, "utf8");

if( !$conexion ){
    die('Error en la conexión '.mysqli_connect_errno());
}