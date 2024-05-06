<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'bd_banco');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

// Procesar el formulario de alta de cuentas bancarias
if (isset($_POST['alta_cuenta'])) {
    $numero_cuenta = $_POST['numero_cuenta'];
    $saldo = $_POST['saldo'];
    $tipo_cuenta = $_POST['tipo_cuenta'];
    $persona_id = $_POST['persona_id'];

    // Insertar la cuenta bancaria en la base de datos
    $sql = "INSERT INTO CuentaBancaria (numero_cuenta, saldo, tipo_cuenta, persona_id) VALUES ('$numero_cuenta','$saldo', '$tipo_cuenta', '$persona_id')";
    if ($conexion->query($sql) === TRUE) {
        echo "<script>
                setTimeout(function() {
                    window.location.href = '{$_SERVER['PHP_SELF']}';
                }, 1000);
              </script>";
        exit();
    } else {
        echo "Error al agregar la cuenta: " . $conexion->error;
        exit();
    }
}

// Procesar el formulario de baja de cuentas bancarias
if (isset($_POST['baja_cuenta'])) {
    $id = $_POST['id'];

    // Eliminar la cuenta bancaria de la base de datos
    $sql = "DELETE FROM CuentaBancaria WHERE id=$id";
    if ($conexion->query($sql) === TRUE) {
        // Redireccionar usando JavaScript después de un breve retraso
        echo "<script>
                setTimeout(function() {
                    window.location.href = '{$_SERVER['PHP_SELF']}';
                }, 1000);
              </script>";
        exit();
    } else {
        echo "Error al eliminar la cuenta: " . $conexion->error;
        exit(); // Asegúrate de salir después de imprimir el error
    }
}

// Procesar el formulario de edición de cuentas bancarias
if (isset($_POST['edit_cuenta'])) {
    $edit_id = $_POST['edit_id'];
    $edit_numero_cuenta = $_POST['edit_numero_cuenta'];
    $edit_saldo = $_POST['edit_saldo'];
    $edit_tipo_cuenta = $_POST['edit_tipo_cuenta'];
    $edit_persona_id = $_POST['edit_persona_id'];

    // Actualizar los datos de la cuenta bancaria en la base de datos
    $sql = "UPDATE CuentaBancaria SET numero_cuenta='$edit_numero_cuenta', saldo='$edit_saldo', tipo_cuenta='$edit_tipo_cuenta', persona_id='$edit_persona_id' WHERE id=$edit_id";
    if ($conexion->query($sql) === TRUE) {
        // Redireccionar usando JavaScript después de un breve retraso
        echo "<script>
                setTimeout(function() {
                    window.location.href = '{$_SERVER['PHP_SELF']}';
                }, 1000);
              </script>";
        exit();
    } else {
        echo "Error al modificar la cuenta: " . $conexion->error;
        exit(); // Asegúrate de salir después de imprimir el error
    }
}

// Consulta para obtener todas las personas
$sql_personas = "SELECT id, nombre, apellido FROM Persona";
$resultado_personas = $conexion->query($sql_personas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM de Cuentas Bancarias</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilo para botones de agregar cuenta */
        .btn-agregar {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        /* Estilo para botones de editar cuenta */
        .btn-editar {
            background-color: #f1c40f; /* Yellow */
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        /* Estilo para botones de eliminar cuenta */
        .btn-eliminar {
            background-color: #e74c3c; /* Red */
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        /* Estilo para botones al pasar el cursor */
        .btn-agregar:hover, .btn-editar:hover, .btn-eliminar:hover {
            background-color: #45a049; /* Green (Cambia el color al verde más oscuro) */
        }
    </style>
</head>
<body>
    <!-- Formulario para agregar cuentas bancarias -->
    <div class="container">
        <?php
        $sql = "SELECT CuentaBancaria.id, numero_cuenta, saldo, tipo_cuenta, Persona.nombre, Persona.apellido FROM CuentaBancaria INNER JOIN Persona ON CuentaBancaria.persona_id = Persona.id";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Numero de Cuenta</th><th>Saldo</th><th>Tipo de Cuenta</th><th>Dueño</th></tr>";
            // Mostrar los datos de cada cuenta bancaria en la tabla
            while($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila['id'] . "</td>";
                echo "<td>" . $fila['numero_cuenta'] . "</td>";
                echo "<td>" . $fila['saldo'] . "</td>";
                echo "<td>" . $fila['tipo_cuenta'] . "</td>";
                echo "<td>" . $fila['nombre'] . " " . $fila['apellido'] . "</td>";
                // Agregar botón de eliminar para cada cuenta bancaria
                echo "<td>
                        <form method='post' action='{$_SERVER['PHP_SELF']}'>
                            <input type='hidden' name='id' value='" . $fila['id'] . "'>
                            <input type='submit' name='baja_cuenta' value='Eliminar' class='btn-eliminar'>
                        </form>
                      </td>";
                // Agregar botón de editar para cada cuenta bancaria
                echo "<td>
                        <button class='btn-editar' onclick='openEditModal(\"" . $fila['id'] . "\", \"" . $fila['numero_cuenta'] . "\", \"" . $fila['saldo'] . "\", \"" . $fila['tipo_cuenta'] . "\", \"" . $fila['nombre'] . "\", \"" . $fila['apellido']. "\")'>Editar</button>
                      </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron cuentas en la base de datos.";
        }
        ?>
        <button id="btn-add-cuenta" class="btn-agregar">Agregar Cuenta</button>

        <!-- Modal para agregar cuenta -->
        <div id="add-cuenta-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <label for="numero_cuenta">Número de Cuenta:</label>
                    <input type="text" name="numero_cuenta" required><br><br>
                    <label for="saldo">Saldo:</label>
                    <input type="number" name="saldo" required><br><br>
                    <label for="tipo_cuenta">Tipo de Cuenta:</label>
                    <select name="tipo_cuenta" required>
                        <option value="Corriente">Corriente</option>
                        <option value="Ahorros">Ahorros</option>
                        <option value="Inversión">Inversión</option>
                    </select><br><br>
                    <label for="persona_id">Dueño de la Cuenta:</label>
                    <select name="persona_id" required>
                        <?php
                        // Mostrar todas las personas como opciones en el menú desplegable
                        while ($fila_persona = $resultado_personas->fetch_assoc()) {
                            echo "<option value='" . $fila_persona['id'] . "'>" . $fila_persona['nombre'] . " " . $fila_persona['apellido'] . "</option>";
                        }
                        ?>
                    </select><br><br>
                    <input type="submit" name="alta_cuenta" value="Agregar cuenta">
                </form>
            </div>
        </div>

        <!-- Modal para editar cuenta -->
        <div id="edit-cuenta-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <form id="edit-cuenta-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <label for="edit_numero_cuenta">Numero de cuenta:</label>
                    <input type="text" id="edit_numero_cuenta" name="edit_numero_cuenta"><br><br>
                    <label for="edit_saldo">Saldo:</label>
                    <input type="text" id="edit_saldo" name="edit_saldo"><br><br>
                    <label for="edit_tipo_cuenta">Tipo de cuenta:</label>
                    <select name="edit_tipo_cuenta" required>
                        <option value="Corriente">Corriente</option>
                        <option value="Ahorros">Ahorros</option>
                        <option value="Inversión">Inversión</option>
                    </select><br><br>
                    <label for="edit_persona_id">Dueño de la Cuenta:</label>
                    <select name="edit_persona_id">
                        <?php
                        // Mostrar todas las personas como opciones en el menú desplegable
                        $resultado_personas->data_seek(0);
                        while ($fila_persona = $resultado_personas->fetch_assoc()) {
                            echo "<option value='" . $fila_persona['id'] . "'>" . $fila_persona['nombre'] . " " . $fila_persona['apellido'] . "</option>";
                        }
                        ?>
                    </select><br><br>
                    <input type="submit" name="edit_cuenta" value="Editar cuenta">
                </form>
            </div>
        </div>

    </div>

    <script>
        //Obtener el modal de agregar cuenta
        var addModal = document.getElementById("add-cuenta-modal");

        // Obtener el botón para abrir el modal de agregar cuenta
        var addBtn = document.getElementById("btn-add-cuenta");

        // Obtener el botón para cerrar el modal de agregar cuenta
        var addSpan = document.getElementById("add-cuenta-modal").getElementsByClassName("close")[0];

        // Cuando se haga clic en el botón, abrir el modal de agregar cuenta
        addBtn.onclick = function() {
            addModal.style.display = "block";
        }

        // Cuando se haga clic en <span> (x), cerrar el modal de agregar cuenta
        addSpan.onclick = function() {
            addModal.style.display = "none";
        }

        // Cuando se haga clic en cualquier lugar fuera del modal, cerrar el modal de agregar cuenta
        window.onclick = function(event) {
            if (event.target == addModal) {
                addModal.style.display = "none";
            }
        }

        // Función para abrir el modal de editar cuenta y prellenar los campos
        function openEditModal(id, numero_cuenta, saldo, tipo_cuenta, nombre, apellido) {
            var editModal = document.getElementById("edit-cuenta-modal");
            var editForm = document.getElementById("edit-cuenta-form");

            // Poner los valores de la cuenta en los campos del formulario de edición
            editForm.elements["edit_id"].value = id;
            editForm.elements["edit_numero_cuenta"].value = numero_cuenta;
            editForm.elements["edit_saldo"].value = saldo;
            editForm.elements["edit_tipo_cuenta"].value = tipo_cuenta;
            editForm.elements["edit_persona_id"].value = nombre + " " + apellido;

            // Mostrar el modal de editar cuenta
            editModal.style.display = "block";
        }

        // Obtener el botón para cerrar el modal de editar cuenta
        var editSpan = document.getElementById("edit-cuenta-modal").getElementsByClassName("close")[0];

        // Cuando se haga clic en <span> (x), cerrar el modal de editar cuenta
        editSpan.onclick = function() {
            var editModal = document.getElementById("edit-cuenta-modal");
            editModal.style.display = "none";
        }
    </script>
</body>
</html>
