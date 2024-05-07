<?php
// Redirigir a la página de inicio de sesión si el usuario no está autenticado
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Mi Aplicación Bancaria</title>
</head>
<body>
    <h1>Bienvenido a Mi Aplicación Bancaria</h1>
    <p>Esta es la página de inicio. Solo los usuarios autenticados pueden ver este contenido.</p>
    <p>¡Explora nuestras características emocionantes!</p>
    <ul>
        <li><a href="dashboard.php">Ir al Panel de Control</a></li>
        <li><a href="logout.php">Cerrar sesión</a></li>
    </ul>
</body>
</html>
