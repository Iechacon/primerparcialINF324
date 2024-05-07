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
        .eliminar {
            background-color: #ff6961;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Tablas de Personas y Cuentas Bancarias</h2>

    <h3>Tabla de Personas</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Acción</th>
        </tr>
        <?php
        require_once('conexion.php');
        
        $query_personas = "SELECT * FROM persona";
        $result_personas = mysqli_query($conexion, $query_personas);

        while ($row = mysqli_fetch_assoc($result_personas)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido'] . "</td>";
            echo "<td>" . $row['direccion'] . "</td>";
            echo "<td><form action='eliminar_persona.php' method='post'><input type='hidden' name='id' value='" . $row['id'] . "'><button type='submit' class='eliminar'>Eliminar</button></form></td>";
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
            <th>Acción</th>
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
            echo "<td><form action='eliminar_cuenta.php' method='post'><input type='hidden' name='id' value='" . $row['id'] . "'><button type='submit' class='eliminar'>Eliminar</button></form></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <a href="dashboard.php">Volver al Dashboard</a>
</body>
</html>
