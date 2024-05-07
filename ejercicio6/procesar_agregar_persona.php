<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];

    $query = "INSERT INTO persona (nombre, apellido, direccion) VALUES ('$nombre', '$apellido', '$direccion')";
    if (mysqli_query($conexion, $query)) {
        header("Location: tablas.php");
        exit();
    } else {
        echo "Error al agregar persona: " . mysqli_error($conexion);
    }
}
?>
<a href="dashboard.php" >Volver al dashboard</a>