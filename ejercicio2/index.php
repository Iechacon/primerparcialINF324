<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM de Personas y Cuentas Bancarias</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        header {
            background-color: #3498db;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .options {
            margin-bottom: 20px;
            text-align: center;
        }

        .options button {
            background-color: #2ecc71;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .options button:hover {
            background-color: #27ae60;
        }

        /* Estilo para el contenido */
        .content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: none;
        }

        .content h2 {
            color: #333;
            text-align: center;
        }

        .note {
            font-style: italic;
            margin-top: 20px;
            color: #666;
            padding: 20px;
            background-color: #ecf0f1;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
        }
    </style>
</head>
<body>
    <header style="height: 60px">
        <h1>ABC de Personas y Cuentas Bancarias</h1>
    </header>
    <div class="container">
        <!-- Contenedor de botones -->
        <div class="options" id="buttonContainer">
            <button  style="width: 330px; height: 270px; background-image: url(persona.jpg); font-family: verdana; color: white"  onclick="showContent('personas')"><h2>Mostrar Personas</h2></button>
            <button style="width: 330px; height: 270px; background-image: url(cuentas.png); font-family: verdana; color: white" onclick="showContent('cuentas')"><h2>Mostrar Cuentas Bancarias</h2></button>
        </div>

        <div id="personasContent" class="content">
            <h2>Personas</h2>
            <!-- Contenido de personas -->
            <?php include 'abm_personas.php'; ?>
            <button onclick="showButtons()">Volver</button>
        </div>

        <div id="cuentasContent" class="content">
            <h2>Cuentas Bancarias</h2>
            <!-- Contenido de cuentas bancarias -->
            <?php include 'abm_cuentas.php'; ?>
            <button onclick="showButtons()">Volver</button>
        </div>
    </div>
    <!-- Nota -->
    <div class="note">
        <h2>Nota:</h2>
        <p>Si hace cambios en personas o en cuentas, debe volver a ingresar haciendo click en el botón correspondiente.</p>
    </div>

    <script>
        function showContent(contentId) {
            document.getElementById("buttonContainer").style.display = "none";
            document.querySelector(".note").style.display = "none";
            document.getElementById(contentId + "Content").style.display = "block";
        }

        function showButtons() {
            document.getElementById("buttonContainer").style.display = "block";
            document.querySelector(".note").style.display = "block";
            document.getElementById("personasContent").style.display = "none";
            document.getElementById("cuentasContent").style.display = "none";
        }
    </script>
</body>
</html>
