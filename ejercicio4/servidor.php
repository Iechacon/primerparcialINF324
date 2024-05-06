<?php
// Procesar la solicitud GET/POST y devolver algunos datos
$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];
$direccion = $_GET["direccion"];

echo "Nombre".$nombre;

echo "Apellido".$apellido;

echo "Direccion".$direccion;
if(isset($_GET["ok"]))
    echo "acepto";
else
    echo "acepto";
?>