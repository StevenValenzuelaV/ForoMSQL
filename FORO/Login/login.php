<?php
session_start(); 
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $clave = $_POST['clave'];

    // Buscar el usuario y clave en la base
    $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE username = ? AND clave = ?");
    $consulta->bind_param("ss", $username, $clave);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows === 1) {
        // Usuario autenticado
        $_SESSION['usuario'] = $username;
        $_SESSION['clave'] = $clave;
          header("Location: bienvenida.php"); 
exit();
    } else {
        echo "<div class='alert alert-danger'>Usuario o contraseña incorrectos.</div>";
    }

    $consulta->close();
    $conexion->close();  
}
?>

