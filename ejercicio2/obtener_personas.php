<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'bd_Ivon');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

// Consulta para obtener todas las personas
$sql_personas = "SELECT id, nombre, apellido, direccion FROM Persona";
$resultado_personas = $conexion->query($sql_personas);

// Construir la lista de personas en formato HTML
$html_personas = "";
if ($resultado_personas->num_rows > 0) {
    while($row = $resultado_personas->fetch_assoc()) {
        $html_personas .= "<li>" . $row["nombre"] . " " . $row["apellido"] . " - " . $row["direccion"] . "</li>";
    }
} else {
    $html_personas = "<li>No se encontraron personas.</li>";
}

// Imprimir la lista de personas
echo $html_personas;

// Cerrar la conexión
$conexion->close();
?>
