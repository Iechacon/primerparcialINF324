<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Persona</title>
</head>
<body>
    <h2>Agregar Persona</h2>
    <form action="procesar_agregar_persona.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br><br>
        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido"><br><br>
        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion"><br><br>
        <input type="submit" value="Agregar Persona">
    </form>
    <a href="dashboard.php">Volver al Dashboard</a>
</body>
</html>
