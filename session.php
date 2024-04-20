<?php
include 'conexion.php';
?>
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

    // Obtener datos del formulario de inicio de sesión
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar credenciales de inicio de sesión
    $sql = "SELECT * FROM adminusuarios WHERE correo='$email' AND contrasena='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {        

      $rolR = $result->fetch_assoc();
      $rol = $rolR['rol'];

        if($rol == 2){
          $_SESSION["email"] = $email;
          $_SESSION["rol"] = $rol;
          header("Location: /Nolas/vista/contenido.php"); 
          exit(); 
        }
        else{
          $_SESSION["email"] = $email;
          $_SESSION["rol"] = $rol;
          header("Location: /Nolas/vista/usuarios.php"); 
          exit(); 
        }
       

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
