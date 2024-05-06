<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maquetado de Cuentas Bancarias</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Tipos de Cuentas Bancarias</h1>
        
        <div class="cuenta">
            <h2>Cuenta Corriente</h2>
            <?php include 'cuenta_corriente.php'; ?>
        </div>

        <div class="cuenta">
            <h2>Cuenta de Ahorros</h2>
            <?php include 'cuenta_ahorros.php'; ?>
        </div>

        <div class="cuenta">
            <h2>Cuenta de Inversión</h2>
            <?php include 'cuenta_inversion.php'; ?>
        </div>
    </div>
</body>
</html>
