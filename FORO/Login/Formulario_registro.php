<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Mitologías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/paginas.css" rel="stylesheet">
</head>
<body>
    <header>
    </header> <br>

        <div class="card mx-auto shadow p-4" style="max-width: 500px;">
            <h2 class="text-center mb-4">Registro de Usuario</h2>
               <!-- Formulario que se enviará por POST -->
            <form  method="POST">
                  <!-- Campo de texto para el nombre de usuario -->
                <div class="mb-3">
                    <label class="form-label">Nombre de usuario:</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                  <!-- Campo de texto para la clave-->
                <div class="mb-3">
                    <label class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="clave" required>
                </div>
                  <!-- Campo de texto para mitologia favorita -->
                <div class="mb-3">
                    <label class="form-label">Mitología favorita:</label>
                    <input type="text" class="form-control" name="mitologia" required>
                </div>
                  <!-- Campo de texto para el dios -->
                <div class="mb-3">
                    <label class="form-label">Dios que más te interesa:</label>
                    <input type="text" class="form-control" name="dios" required>
                </div>
                  <!-- Campo de texto para la criatura -->
                <div class="mb-3">
                    <label class="form-label">Criatura mítica favorita:</label>
                    <input type="text" class="form-control" name="criatura" required>
                </div>
                  <!-- Campo de texto para el correo -->
                <div class="mb-3">
                    <label class="form-label">Correo:</label>
                    <input type="email" class="form-control" name="correo" required>
                </div>
                     <!-- Botón para enviar el formulario -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
            </form>
            
        <!-- Enlace a la página de inicio de sesión -->
            <div class="text-center mt-3">
                <p>¿Ya tienes una cuenta? <a href="index.html">Inicia sesión</a></p>
            </div>
        </div>
   <?php
require 'conexion.php';
// Verifica si se ha enviado el formulario por método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST ['username'];    
    $clave	= $_POST ['clave'];
    $mitologia	= $_POST ['mitologia'];
    $dios	= $_POST ['dios'];
    $criatura	= $_POST ['criatura'];
    $correo	= $_POST ['correo'];

     // Prepara una consulta para verificar si el usuario, correo o clave ya existe
    $verificar = $conexion->prepare("SELECT * FROM usuarios WHERE username = ? OR correo = ? OR clave = ?");
    $verificar->bind_param("sss", $username, $correo, $clave);
    $verificar->execute();
    $resultado = $verificar->get_result();

    if ($resultado->num_rows > 0) {
        echo "<div class='alert alert-danger mt-3'>Ya existe un usuario con ese nombre, correo o contraseña.</div>";
    } else {
        // Si no existe, se inserta el nuevo usuario en la base de datos
$consulta = $conexion ->prepare ("INSERT INTO usuarios (username, clave, mitologia, dios, criatura, correo) VALUES (?, ?, ?, ?, ?, ?)");
$consulta ->bind_param("ssssss", $username, $clave, $mitologia, $dios, $criatura, $correo);
$consulta->execute();
   // Mensaje de éxito
            echo"<div class='alert alert-success mt-3'>Usuario registrado correctamente.</div>";
            // Cierra la consulta
 $consulta->close();
        }
  // Cierra la conexión y la consulta de verificación
 $conexion->close();
 $verificar->close();
}
?>
</body>
</html>
