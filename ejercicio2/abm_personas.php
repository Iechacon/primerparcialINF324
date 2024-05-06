<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'bd_banco');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

// Procesar el formulario de alta de personas
if (isset($_POST['alta_persona'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];

    // Insertar la persona en la base de datos
    $sql = "INSERT INTO Persona (nombre, apellido, direccion) VALUES ('$nombre', '$apellido', '$direccion')";
    if ($conexion->query($sql) === TRUE) {
        // Redireccionar usando JavaScript después de un breve retraso
        echo "<script>
                setTimeout(function() {
                    window.location.href = '{$_SERVER['PHP_SELF']}';
                }, 1000);
              </script>";
        exit();
    } else {
        echo "Error al agregar la persona: " . $conexion->error;
        exit(); // Asegúrate de salir después de imprimir el error
    }
}

// Procesar el formulario de baja de personas
if (isset($_POST['baja_persona'])) {
    $id = $_POST['id'];

    // Eliminar la persona de la base de datos
    $sql = "DELETE FROM Persona WHERE id=$id";
    if ($conexion->query($sql) === TRUE) {
        // Redireccionar usando JavaScript después de un breve retraso
        echo "<script>
                setTimeout(function() {
                    window.location.href = '{$_SERVER['PHP_SELF']}';
                }, 1000);
              </script>";
        exit();
    } else {
        echo "Error al eliminar la persona: " . $conexion->error;
        exit(); // Asegúrate de salir después de imprimir el error
    }
}

// Procesar el formulario de edición de personas
if (isset($_POST['edit_persona'])) {
    $edit_id = $_POST['edit_id'];
    $edit_nombre = $_POST['edit_nombre'];
    $edit_apellido = $_POST['edit_apellido'];
    $edit_direccion = $_POST['edit_direccion'];

    // Actualizar los datos de la persona en la base de datos
    $sql = "UPDATE Persona SET nombre='$edit_nombre', apellido='$edit_apellido', direccion='$edit_direccion' WHERE id=$edit_id";
    if ($conexion->query($sql) === TRUE) {
        // Redireccionar usando JavaScript después de un breve retraso
        echo "<script>
                setTimeout(function() {
                    window.location.href = '{$_SERVER['PHP_SELF']}';
                }, 1000);
              </script>";
        exit();
    } else {
        echo "Error al modificar la persona: " . $conexion->error;
        exit(); // Asegúrate de salir después de imprimir el error
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM de Personas y Cuentas Bancarias</title>
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
    <div class="container">
        <?php
        // Obtener todas las personas de la base de datos
        $sql = "SELECT id, nombre, apellido, direccion FROM Persona";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Dirección</th><th>Acciones</th></tr>";
            // Mostrar los datos de cada persona en la tabla
            while($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila['id'] . "</td>";
                echo "<td>" . $fila['nombre'] . "</td>";
                echo "<td>" . $fila['apellido'] . "</td>";
                echo "<td>" . $fila['direccion'] . "</td>";
                // Agregar botón de eliminar para cada persona
                echo "<td>
                        <form method='post' action='{$_SERVER['PHP_SELF']}'>
                            <input type='hidden' name='id' value='" . $fila['id'] . "'>
                            <input type='submit' name='baja_persona' value='Eliminar' class='btn-eliminar'>
                        </form>
                      </td>";
                // Agregar botón de editar para cada persona
                echo "<td>
                        <button class='btn-editar' onclick='openEditModal(\"" . $fila['id'] . "\", \"" . $fila['nombre'] . "\", \"" . $fila['apellido'] . "\", \"" . $fila['direccion'] . "\")'>Editar</button>
                      </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron personas en la base de datos.";
        }
        ?>
        
        <button id="btn-add-persona" class='btn-agregar'>Agregar Persona</button>

        <!-- Modal para agregar persona -->
        <div id="add-persona-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre"><br><br>
                    <label for="apellido">Apellido:<option value="Ahorros">Ahorros</option></label>
                    <input type="text" id="apellido" name="apellido"><br><br>
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion"><br><br>
                    <input type="submit" name="alta_persona" value="Agregar">
                </form>
            </div>
        </div>

        <!-- Modal para editar persona -->
        <div id="edit-persona-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <form id="edit-persona-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <label for="edit_nombre">Nombre:</label>
                    <input type="text" id="edit_nombre" name="edit_nombre"><br><br>
                    <label for="edit_apellido">Apellido:</label>
                    <input type="text" id="edit_apellido" name="edit_apellido"><br><br>
                    <label for="edit_direccion">Dirección:</label>
                    <input type="text" id="edit_direccion" name="edit_direccion"><br><br>
                    <input type="submit" name="edit_persona" value="Guardar cambios">
                </form>
            </div>
        </div>

    </div>

    <script>
        // Obtener el modal de agregar persona
        var addModal = document.getElementById("add-persona-modal");

        // Obtener el botón para abrir el modal de agregar persona
        var addBtn = document.getElementById("btn-add-persona");

        // Obtener el botón para cerrar el modal de agregar persona
        var addSpan = document.getElementById("add-persona-modal").getElementsByClassName("close")[0];

        // Cuando se haga clic en el botón, abrir el modal de agregar persona
        addBtn.onclick = function() {
            addModal.style.display = "block";
        }

        // Cuando se haga clic en <span> (x), cerrar el modal de agregar persona
        addSpan.onclick = function() {
            addModal.style.display = "none";
        }

        // Cuando se haga clic en cualquier lugar fuera del modal, cerrar el modal de agregar persona
        window.onclick = function(event) {
            if (event.target == addModal) {
                addModal.style.display = "none";
            }
        }

        // Función para abrir el modal de editar persona y prellenar los campos
        function openEditModal(id, nombre, apellido, direccion) {
            var editModal = document.getElementById("edit-persona-modal");
            var editForm = document.getElementById("edit-persona-form");

            // Poner los valores de la persona en los campos del formulario de edición
            editForm.elements["edit_id"].value = id;
            editForm.elements["edit_nombre"].value = nombre;
            editForm.elements["edit_apellido"].value = apellido;
            editForm.elements["edit_direccion"].value = direccion;

            // Mostrar el modal de editar persona
            editModal.style.display = "block";
        }

        // Obtener el botón para cerrar el modal de editar persona
        var editSpan = document.getElementById("edit-persona-modal").getElementsByClassName("close")[0];

        // Cuando se haga clic en <span> (x), cerrar el modal de editar persona
        editSpan.onclick = function() {
            var editModal = document.getElementById("edit-persona-modal");
            editModal.style.display = "none";
        }
    </script>
</body>
</html>
