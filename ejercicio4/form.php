<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consulta de Personas y Cuentas Bancarias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<?php
// Conectar a la base de datos
$conn = new mysqli('localhost', 'root', '', 'bd_banco');

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesar los datos del formulario de la persona
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["ok"])) {
    // Verificar si se han recibido los datos del formulario de la persona
    if (isset($_GET["nombre"]) && isset($_GET["apellido"]) && isset($_GET["direccion"])) {
        $nombre = $_GET["nombre"];
        $apellido = $_GET["apellido"];
        $direccion = $_GET["direccion"];

        // Insertar los datos de la persona en la tabla Persona
        $sql_insert_persona = "INSERT INTO Persona (nombre, apellido, direccion) VALUES ('$nombre', '$apellido', '$direccion')";
        if ($conn->query($sql_insert_persona) === TRUE) {
            echo "Los datos de la Persona se han insertado correctamente.<br>";
        } else {
            echo "Error al insertar los datos de la Persona: " . $conn->error;
        }
    }
}

// Procesar los datos del formulario de la cuenta bancaria
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["ok"])) {
    // Verificar si se han recibido los datos del formulario de la cuenta bancaria
    if (isset($_GET["numero_cuenta"]) && isset($_GET["saldo"]) && isset($_GET["tipo_cuenta"]) && isset($_GET["persona_id"])) {
        $numero_cuenta = $_GET["numero_cuenta"];
        $saldo = $_GET["saldo"];
        $tipo_cuenta = $_GET["tipo_cuenta"];
        $persona_id = $_GET["persona_id"];

        // Insertar los datos de la cuenta bancaria en la tabla CuentaBancaria
        $sql_insert_cuenta = "INSERT INTO CuentaBancaria (numero_cuenta, saldo, tipo_cuenta, persona_id) VALUES ('$numero_cuenta', '$saldo', '$tipo_cuenta', '$persona_id')";
        if ($conn->query($sql_insert_cuenta) === TRUE) {
            echo "Los datos de la Cuenta Bancaria se han insertado correctamente.<br>";
        } else {
            echo "Error al insertar los datos de la Cuenta Bancaria: " . $conn->error;
        }
    }
}

// Mostrar los datos de Personas
$sql_select_personas = "SELECT * FROM Persona";
$result_personas = $conn->query($sql_select_personas);
if ($result_personas->num_rows > 0) {
    echo "<h3>Datos de Personas:</h3>";
    echo "<ul>";
    while ($row = $result_personas->fetch_assoc()) {
        echo "<li>Nombre: " . $row["nombre"] . ", Apellido: " . $row["apellido"] . ", Dirección: " . $row["direccion"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No se encontraron datos de Personas en la base de datos.<br>";
}

// Mostrar los datos de Cuentas Bancarias
$sql_select_cuentas = "SELECT * FROM CuentaBancaria";
$result_cuentas = $conn->query($sql_select_cuentas);
if ($result_cuentas->num_rows > 0) {
    echo "<h3>Datos de Cuentas Bancarias:</h3>";
    echo "<ul>";
    while ($row = $result_cuentas->fetch_assoc()) {
        echo "<li>Número de Cuenta: " . $row["numero_cuenta"] . ", Saldo: " . $row["saldo"] . ", Tipo de Cuenta: " . $row["tipo_cuenta"] . ", ID de Persona: " . $row["persona_id"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No se encontraron datos de Cuentas Bancarias en la base de datos.<br>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

</body>
</html>