<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .vh-100 {
            height: 100vh;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
</head>
<body>
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="/Nolas/img/recuperarpass.jpg"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form id="recoveryForm" action="/Nolas/conexion/recuperar.php" method="post">

                                        <div class="text-center mb-4">
                                            <img src="/Nolas/img/logo.png" alt="Academy UTP Logo" class="img-fluid" style="max-width: 200px; height: auto; border-radius: 50%;">
                                        </div>

                                        <h5 class="text-center fw-normal mb-4" style="letter-spacing: 1px;">Recuperar contraseña</h5>

                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text" style="border-radius: 0.5rem 0 0 0.5rem;"><i class="fas fa-envelope"></i></span>
                                                <input type="email" id="email" class="form-control" name="email" required placeholder="Correo electrónico" style="border-radius: 0 0.5rem 0.5rem 0; font-family: 'Roboto', sans-serif;">
                                            </div>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Enviar solicitud</button>
                                        </div>

                                        <a href="/Nolas/vista/inicio.php" class="small text-muted">Regresar al inicio de sesión</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('recoveryForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario
            mostrarAlerta(); // Muestra la alerta
        });

        function mostrarAlerta() {
            Swal.fire({
                title: 'Solicitud enviada',
                text: 'Se ha enviado un correo electrónico con las instrucciones para recuperar tu contraseña',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirecciona a la página de inicio de sesión
                    window.location.href = '/Nolas/vista/inicio.php';
                }
            });
        }
    </script>
</body>
</html>
