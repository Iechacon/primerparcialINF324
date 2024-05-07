<?php
require_once('conexion.php');

$query = "SELECT 
            SUM(CASE WHEN tipo_cuenta = 'ahorros' THEN saldo ELSE 0 END) AS monto_ahorros,
            SUM(CASE WHEN tipo_cuenta = 'inversion' THEN saldo ELSE 0 END) AS monto_inversion,
            SUM(CASE WHEN tipo_cuenta = 'corriente' THEN saldo ELSE 0 END) AS monto_corriente,
            direccion
          FROM cuentabancaria
          INNER JOIN persona ON cuentabancaria.persona_id = persona.id
          GROUP BY direccion";

$result = mysqli_query($conexion, $query);

if ($result) {
    echo "<h2>Montos existentes por departamento</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Dirección</th><th>Monto Ahorros</th><th>Monto Inversión</th><th>Monto Corriente</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['direccion'] . "</td>";
        echo "<td>" . $row['monto_ahorros'] . "</td>";
        echo "<td>" . $row['monto_inversion'] . "</td>";
        echo "<td>" . $row['monto_corriente'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Error al obtener los montos por departamento: " . mysqli_error($conexion);
}
?>
