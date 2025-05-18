<?php
$host = "localhost";
$usuario = "root"; 
$contrasena = "";  
$bd = "mytologias";

// Crear conexión
$conexion = new mysqli($host, $usuario, $contrasena, $bd);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

?>
