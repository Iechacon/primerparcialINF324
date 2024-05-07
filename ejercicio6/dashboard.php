<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$rol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Bienvenido, <?php echo "$nombre $apellido"; ?>!</h2>
    <p>Tu rol: <?php echo $rol; ?></p>

    <!-- Mostrar opciones según el rol -->
    <?php if ($rol == 'editor'): ?>
    <h3>Opciones para Editor</h3>
    <ul>
        <li><a href="agregar_persona.php">Agregar Persona</a></li>
        <li><a href="agregar_cuenta.php">Agregar Cuenta Bancaria</a></li>
        <li><a href="tablas.php">Listar Personas</a></li>
    </ul>
    <?php elseif ($rol == 'administrador'): ?>
    <h3>Opciones Adicionales para Administrador</h3>
    <ul>
        <li><a href="agregar_persona.php">Agregar Persona</a></li>
        <li><a href="agregar_cuenta.php">Agregar Cuenta Bancaria</a></li>
        <li><a href="tablasel.php">Eliminar Persona</a></li>
        <li><a href="tablas.php">Mostrar los datos</a></li>
    </ul>
    <?php elseif ($rol == 'director bancario'): ?>
    <h3>Opciones Adicionales para Administrador</h3>
    <ul>
        <li><a href="tabla2.php">Mostrar los datos</a></li>
    </ul>
    <!-- Mostrar opciones específicas para administrador -->
    <?php else: 
        header("Location: tablas.php");?>
    <!-- Mostrar opciones específicas para usuario -->
    <?php endif; ?>

    <a href="logout.php">Cerrar sesión</a>
</body>
</html>

