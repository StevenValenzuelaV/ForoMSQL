<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/paginas.css" rel="stylesheet">
</head>
<body>
    <!-- Contenedor principal con márgenes -->
    <div class="container mt-4">
        <div class="card mx-auto shadow p-4" style="max-width: 500px;">
            <div class="text-center">
                <?php
                // Verifica si el usuario y la clave están almacenados en la sesión
                if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])) {
                     // Muestra mensaje de bienvenida con el nombre de usuario
                    // htmlspecialchars evita inyecciones XSS
                    echo "<h1>¡Hola, " . htmlspecialchars($_SESSION['usuario']) . "!</h1>";
                    echo "<p>Bienvenido al portal.</p>";
                     // Botón para cerrar sesión (actualmente redirige a index.html)
                    echo "<a href='index.html' class='btn btn-primary'>Cerrar sesión</a>";
                } else {
                     // Si no hay sesión iniciada, muestra mensaje de no autenticado
                    echo "<h1>No estás autenticado.</h1>";
                     // Enlace para volver al inicio de sesión
                    echo "<a href='index.html' class='btn btn-primary'>Volver al inicio de sesión</a>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>