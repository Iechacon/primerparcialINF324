<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Consulta para eliminar la cuenta bancaria con el ID especificado
    $query = "DELETE FROM cuentabancaria WHERE id = '$id'";
    if (mysqli_query($conexion, $query)) {
        echo "Cuenta bancaria eliminada exitosamente";
    } else {
        echo "Error al eliminar cuenta bancaria: " . mysqli_error($conexion);
    }
}
?>
<a href="dashboard.php">Volver al dashboard</a>