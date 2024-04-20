<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrando sesión</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <?php
    // Iniciar la sesión
    session_start();

    // Destruir todas las variables de sesión
    $_SESSION = array();

    // Si se desea destruir la sesión completamente, borra también la cookie de sesión
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finalmente, destruir la sesión
    session_destroy();
    ?>

<script>
    // Mostrar SweetAlert antes de redirigir al usuario
    Swal.fire({
        title: 'Cerrando sesión',
        html: '<div style="margin-top:10px; margin-bottom:10px;"><i class="fas fa-spinner fa-spin fa-2x"></i></div>', // Icono de carga de Font Awesome
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        allowOutsideClick: false,
        willClose: () => {
            // Redirigir al usuario a la página de inicio de sesión u otra página
            window.location.href = '/Nolas/vista/inicio.php';
        }
    });
</script>

</body>
</html>
