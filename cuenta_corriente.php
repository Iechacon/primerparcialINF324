<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'bd_banco');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

// Consulta para obtener una cuenta corriente
$sql = "SELECT numero_cuenta, saldo FROM CuentaBancaria WHERE tipo_cuenta = 'Corriente'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Mostrar los datos de la cuenta corriente
    while($row = $resultado->fetch_assoc()) {
        echo "<div class='details'>";
        echo "<p>Número de Cuenta: " . $row["numero_cuenta"] . "</p>";
        echo "<p>Saldo: $" . $row["saldo"] . "</p>";
        echo "<p>Tipo de Cuenta: Corriente</p>";
        echo "</div>";
    }
} else {
    echo "No se encontraron cuentas corrientes.";
}

// Cerrar la conexión
$conexion->close();
?>
