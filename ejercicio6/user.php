<?php

class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function authenticate($username, $password) {
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $this->conn->query($query);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function getUserById($user_id) {
        $query = "SELECT * FROM users WHERE id = $user_id";
        $result = $this->conn->query($query);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    // Otros métodos para crear, actualizar y eliminar usuarios según los permisos del administrador
}

// Ejemplo de uso
$servername = "localhost";
$username = "root";
$password = "";
$database = "bd_banco";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear objeto de usuario
$user = new User($conn);

// Autenticar usuario
$userData = $user->authenticate("nombre_de_usuario", "contraseña");

if ($userData) {
    echo "Usuario autenticado: " . $userData['username'];
} else {
    echo "Error de autenticación";
}

// Obtener información de usuario por ID
$userInfo = $user->getUserById(1);

if ($userInfo) {
    echo "Información del usuario: " . $userInfo['username'];
} else {
    echo "Usuario no encontrado";
}

// Cerrar conexión
$conn->close();

?>
