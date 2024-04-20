<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['email'])) {
    // Redirigir al usuario a la página de inicio de sesión requerida
    header("Location: /Nolas/vista/error_autenticacion.php");
    exit(); // Asegurar que el resto del código no se ejecute
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Navegación</title>
    <link rel="stylesheet" href="/Nolas/css/styles.css">
    <link rel="stylesheet" href="/Nolas/css/modal.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/Nolas/vista/contenido.php">Academy UTP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/Nolas/vista/contenido.php"><i class="fas fa-book-open mr-1"></i> Contenido</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Nolas/vista/nosotros.php"><i class="fas fa-users mr-1"></i> Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Nolas/vista/servicios.php"><i class="fas fa-cogs mr-1"></i> Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Nolas/vista/contacto.php"><i class="fas fa-envelope mr-1"></i> Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Nolas/vista/logout.php"><i class="fas fa-sign-out-alt mr-1"></i> Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <main class="container mt-4">
        <section id="introduccion">
        <h2>¡Bienvenido!</h2>
            <p>
                Explora y descubre el fascinante mundo de los números a través de nuestra plataforma interactiva. Desde conceptos básicos hasta aplicaciones avanzadas, estamos aquí para ayudarte a comprender y dominar la recta numérica de una manera divertida y educativa. ¡Comienza tu viaje matemático con nosotros hoy mismo!            
            </p>
        </section>

        <section id="lecciones">
            <h2 class="mt-5 mb-5">Temas</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="/Nolas/img/recta_tema1.jpg" width="350" height="250 class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title mb-5">Tema 1: Introducción a la Recta Numérica</h5>
                            <button type="submit" class="btn btn-primary tema-btn" data-tema="tema1.php">Ir al tema</button>           
                        </div>
                    </div>
                </div>
                <!-- Agrega más cards para cada lección -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="/Nolas/img/recta_tema2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title mb-5">Tema 2:  Operaciones Básicas en la Recta Numérica</h5>
                            <button type="submit" class="btn btn-primary tema-btn"  data-tema="tema2.php">Ir al tema</button>           
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="/Nolas/img/recta_tema3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title mb-5">Tema 3: Fracciones y Decimales en la Recta Numérica</h5>
                            <button type="submit" class="btn btn-primary tema-btn" data-tema="tema3.php">Ir al tema</button>           
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="/Nolas/img/recta_tema4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title mb-5">Tema 4: Comparación de Números en la Recta Numérica</h5>
                            <button type="submit" class="btn btn-primary tema-btn" data-tema="tema4.php">Ir al tema</button>           
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="/Nolas/img/recta_tema5.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title mb-5">Tema 5: Fracciones, Decimales y Porcentajes en la Recta Numérica</h5>
                            <button type="submit" class="btn btn-primary tema-btn" data-tema="tema5.php">Ir al tema</button>           
                        </div>
                    </div>
                </div>               
            </div>
        </section>
    </main>


    <footer>
        <div class="container">
            <p>&copy; 2024 Curso de Recta Numérica</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Cuando se hace clic en un botón de tema

            $('.tema-btn').click(function(e) {
                e.preventDefault(); // Evita que el botón siga el enlace predeterminado

                // Obtiene el valor del atributo data-tema
                var tema = $(this).data('tema');

                console.log(tema); // Muestra el valor de la variable tema en la consola

                // Realizar la solicitud AJAX
                $.ajax({
                    url: 'temas/' + tema, // URL de la página PHP que quieres cargar
                    type: 'GET', // Método de la solicitud (puedes usar 'POST' si lo necesitas)
                    dataType: 'html', // Tipo de datos que esperas recibir
                    success: function(response) {
                        // Éxito: reemplaza todo el contenido del cuerpo de la página con el contenido del tema seleccionado
                        $('body').html(response);
                        var nuevaURL = 'temas/'+tema; // Actualiza esto con la URL de la página cargada dinámicamente
                        history.pushState({}, '', nuevaURL);
                    },
                    error: function(xhr, status, error) {
                        // Maneja los errores si la solicitud AJAX falla
                        console.error(xhr.statusText);
                    }
                });
            });
        });



        // Restaurar el estado adecuado cuando se presiona el botón de retroceso
        // Por ejemplo, recargar la página o cargar la URL anterior
        window.addEventListener('popstate', function(event) {
            window.location.reload(); // Esto recargará la página, puedes ajustarlo según tus necesidades
        });


    </script>



</body>
</html>
