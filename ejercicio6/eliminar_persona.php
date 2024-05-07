<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Consulta para eliminar la persona con el ID especificado
    $query = "DELETE FROM persona WHERE id = '$id'";
    if (mysqli_query($conexion, $query)) {
        echo "Persona eliminada exitosamente";
    } else {
        echo "Error al eliminar persona: " . mysqli_error($conexion);
    }
}
?>
