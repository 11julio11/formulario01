<?php
$servername = "nombre_servidor";
$username = "nombre_usuario";
$password = "contraseña";
$dbname = "nombre_basededatos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    if (validarUsuario($nombre) && validarEmail($email)) {
        $sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro insertado correctamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Usuario o email no válidos.";
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];

    //procesar los datos y generar la respuesta
    $informacion = "¡hola,$nombre!tu emailes$email.";

    
}

$conn->close();

function validarUsuario($nombre) {
    // Agrega tus condiciones de validación para el usuario (por ejemplo, longitud mínima)
    return strlen($nombre) >= 3;
}

function validarEmail($email) {
    // Valida el formato del email
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


?>