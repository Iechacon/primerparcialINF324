<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Cuenta Bancaria</title>
</head>
<body>
    <h2>Agregar Cuenta Bancaria</h2>
    <form action="procesar_agregar_cuenta.php" method="post">
        <label for="numero_cuenta">Número de Cuenta:</label><br>
        <input type="text" id="numero_cuenta" name="numero_cuenta"><br><br>
        <label for="saldo">Saldo:</label><br>
        <input type="text" id="saldo" name="saldo"><br><br>
        <label for="tipo_cuenta">Tipo de Cuenta:</label><br>
        <select id="tipo_cuenta" name="tipo_cuenta">
            <option value="ahorros">Ahorros</option>
            <option value="inversion">Inversión</option>
            <option value="corriente">Corriente</option>
        </select><br><br>
        <label for="persona_id">ID de Persona:</label><br>
        <input type="text" id="persona_id" name="persona_id"><br><br>
        <input type="submit" value="Agregar Cuenta Bancaria">
    </form>
    <a href="dashboard.php">Volver al Dashboard</a>
</body>
</html>
