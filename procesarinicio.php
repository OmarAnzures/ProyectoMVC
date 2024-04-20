<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Inicio de Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
    session_start();

    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $database = "nolascoproducto";

    // Obtener datos del formulario de inicio de sesión
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Crear conexión
    $conn = new mysqli($servername, $username, $password_db, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Verificar credenciales de inicio de sesión
    $sql = "SELECT * FROM usuarios WHERE correo='$email' AND contrasena='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {        

        $_SESSION["email"] = $email;
        header("Location: /Nolas/vista/contenido.php"); 
        exit(); 

    } else {
      
        echo '<script>
                Swal.fire({
                    title: "Error",
                    text: "Correo electrónico o contraseña incorrectos",
                    icon: "error",
                    timer: 2000,
                    timerProgressBar: false,
                    showConfirmButton: false,
                    allowOutsideClick: false
                }).then((result) => {
                    window.location.href = "/Nolas/vista/inicio.php"; // Redirigir al usuario a inicio.php
                });
            </script>';
    }

    // Cerrar conexión
    $conn->close();
    ?>
</body>
</html>
