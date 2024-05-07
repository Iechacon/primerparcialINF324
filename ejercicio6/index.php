<?php
session_start();
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $rol = $_POST['rol'];

    $query = "SELECT id, nombre, apellido FROM persona WHERE nombre = '$nombre'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);
        $_SESSION['id'] = $fila['id'];
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['apellido'] = $fila['apellido'];
        $_SESSION['rol'] = $rol; // Guardar el rol en la sesión

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "No se encontró una persona con ese nombre";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form action="index.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br><br>
        <label for="rol">Rol:</label><br>
        <select id="rol" name="rol">
            <option value="editor">Editor</option>
            <option value="administrador">Administrador</option>
            <option value="usuario">Usuario</option>
            <option value="director bancario">Director Bancario</option> <!-- Nuevo rol -->
        </select><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
