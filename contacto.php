<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["email"])) {
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
    <title>Recursos sobre la Recta Numérica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <a class="nav-link" href="/Nolas/vista/inicio.php" onclick="logout()"><i class="fas fa-sign-out-alt mr-1"></i> Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <header class="container py-4">
        <h1 class="text-center">Recursos sobre la Recta Numérica</h1>
    </header>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2>Recursos Multimedia</h2>
                <p>Te dejamos algunos recursos multimedia para hacer más ameno tu aprendizaje</p>
                <div class="row">
                    <div class="col-md-4">
                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/6MwdfLuIyNI" frameborder="0" allowfullscreen></iframe>
                        <p>Suma y resta de números enteros en la recta numérica</p>
                    </div>
                    <div class="col-md-4">
                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/bmvtRXKOoB0" frameborder="0" allowfullscreen></iframe>
                        <p>Ubicación de números en la recta numérica</p>
                    </div>
                    <div class="col-md-4">
                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/ssL5HNfCnAM" frameborder="0" allowfullscreen></iframe>
                        <p>La recta numérica con números enteros</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <h2>Recursos adicionales sitios web</h2>
                <p>Aquí tienes algunos recursos adicionales que puedes consultar para obtener más información sobre la recta numérica:</p>
                <ul>
                    <li><a href="https://www.thatquiz.org/es-o/?-j12-l1-p0" target="_blank">UNAM quiz Recta Numérica</a></li>
                    <li><a href="https://www.lucaedu.com/que-es-una-recta-numerica/" target="_blank">lucaedu Recta Numérica</a></li>
                    <li><a href="https://www.bartolomecossio.com/MATEMATICAS/recta_numrica.html" target="_blank">Recta Numérica</a></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
