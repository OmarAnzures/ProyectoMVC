<?php
include 'conexion.php';

// Obtener datos del formulario
$email = $_POST['email'];
$password = $_POST['contra'];
$rol = $_POST['idAdmin'];


// Preparar la consulta SQL para insertar los datos del usuario
$sql = "INSERT INTO adminusuarios (correo, contrasena, rol) VALUES ('$email', '$password','$rol')";


// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    // Redirigir al usuario al inicio de sesión
    header("Location: /Nolas/vista/administradores.php");
    exit(); // Asegura que el script se detenga aquí y la redirección se ejecute correctamente
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
