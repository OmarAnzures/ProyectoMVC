<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <!-- Estilos de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Cambiar Contraseña</h2>
        <form id="changePasswordForm" action="/Nolas/conexion/passwordca.php" method="post">
            <label for="password" class="form-label">Nueva Contraseña:</label>
            <input type="password" id="password" name="password" class="form-control" required><br>
            <label for="confirm_password" class="form-label">Confirmar Contraseña:</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required><br>
            <input type="hidden" name="token" value="66b521200f530dc3e07fc1c9bb7b6fc5">
            <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
        </form>
    </div>
    
    <!-- Script de Bootstrap 5 (opcional, si se usan componentes JavaScript de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario
            // Realiza la solicitud AJAX para cambiar la contraseña
            cambiarContraseña();
        });

        function cambiarContraseña() {
            let formData = new FormData(document.getElementById('changePasswordForm'));
            fetch('/Nolas/conexion/passwordca.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    // Muestra la alerta de éxito
                    Swal.fire({
                        title: 'Contraseña cambiada',
                        text: 'La contraseña se cambió correctamente',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        // Redirige a la página de inicio
                        window.location.href = '/Nolas/vista/inicio.php';
                    });
                } else {
                    // Muestra la alerta de error
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un error al cambiar la contraseña',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
