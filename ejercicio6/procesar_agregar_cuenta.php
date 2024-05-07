<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_cuenta = $_POST['numero_cuenta'];
    $saldo = $_POST['saldo'];
    $tipo_cuenta = $_POST['tipo_cuenta'];
    $persona_id = $_POST['persona_id'];

    $query = "INSERT INTO cuentabancaria (numero_cuenta, saldo, tipo_cuenta, persona_id) VALUES ('$numero_cuenta', '$saldo', '$tipo_cuenta', '$persona_id')";
    if (mysqli_query($conexion, $query)) {
        header("Location: tablas.php");
        exit();
    } else {
        echo "Error al agregar cuenta bancaria: " . mysqli_error($conexion);
    }
}
?>
<a href="dashboard.php" >Volver al dashboard</a>