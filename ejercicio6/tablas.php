<?php
session_start();
require_once('conexion.php');

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
    <title>Tablas de Personas y Cuentas Bancarias</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Bienvenido, <?php echo "$nombre $apellido"; ?>!</h2>
    <p>Tu rol: <?php echo $rol; ?></p>

    <h3>Tabla de Personas</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
        </tr>
        <?php
        $query_personas = "SELECT * FROM persona";
        $result_personas = mysqli_query($conexion, $query_personas);

        while ($row = mysqli_fetch_assoc($result_personas)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido'] . "</td>";
            echo "<td>" . $row['direccion'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h3>Tabla de Cuentas Bancarias</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Número de Cuenta</th>
            <th>Saldo</th>
            <th>Tipo de Cuenta</th>
            <th>ID de Persona</th>
        </tr>
        <?php
        $query_cuentas = "SELECT * FROM cuentabancaria";
        $result_cuentas = mysqli_query($conexion, $query_cuentas);

        while ($row = mysqli_fetch_assoc($result_cuentas)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['numero_cuenta'] . "</td>";
            echo "<td>" . $row['saldo'] . "</td>";
            echo "<td>" . $row['tipo_cuenta'] . "</td>";
            echo "<td>" . $row['persona_id'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a href="dashboard.php" >Volver al dashboard</a>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
