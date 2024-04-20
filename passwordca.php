<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si las contraseñas coinciden
    if ($_POST['password'] == $_POST['confirm_password']) {
        // Conexión a la base de datos (modifica las credenciales según tu configuración)
        $servername = "localhost"; // Nombre del servidor
        $username = "root"; // Nombre de usuario de la base de datos
        $password = ""; // Contraseña de la base de datos
        $dbname = "nolascoproducto"; // Nombre de la base de datos

        // Crea la conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Escapa los valores para prevenir inyección SQL
        $password = $conn->real_escape_string($_POST['password']);
        $token = $conn->real_escape_string($_POST['token']);

    

        // Actualiza la contraseña en la base de datos
        $sql = "UPDATE adminusuarios SET contrasena = '$password' WHERE token = '$token'";

        if ($conn->query($sql) === TRUE) {
            // Mostrar mensaje de éxito
            echo '<div class="alert alert-success" role="alert">Contraseña cambiada exitosamente.</div>';
        } else {
            // Mostrar mensaje de error
            echo '<div class="alert alert-danger" role="alert">Error al cambiar la contraseña.</div>';
        }

        // Cierra la conexión
        $conn->close();
    } else {
        // Mostrar mensaje de error si las contraseñas no coinciden
        echo '<div class="alert alert-danger" role="alert">Las contraseñas no coinciden.</div>';
    }
}
?>
