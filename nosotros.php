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
                    <a class="nav-link" href="/Nolas/vista/inicio.php" onclick="logout()"><i class="fas fa-sign-out-alt mr-1"></i> Cerrar Sesión</a>
                </li>
            </ul>
        </div>
        
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Contacto</h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Soporte Técnico - Leonardo</h5>
                    <p class="card-text">Correo electrónico: utp0150894@alumno.utpuebla.edu.mx</p>
                    <p class="card-text">Teléfono: 2223457888</p>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Soporte Técnico - Uzyel</h5>
                    <p class="card-text">Correo electrónico: utp0150859@alumno.utpuebla.edu.mx</p>
                    <p class="card-text">Teléfono: 222345747</p>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Soporte Técnico - Carlos</h5>
                    <p class="card-text">Correo electrónico: utp0150895@alumno.utpuebla.edu.mx</p>
                    <p class="card-text">Teléfono: 2223175845</p>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Soporte Técnico - Emiliano</h5>
                    <p class="card-text">Correo electrónico: utp0150895@alumno.utpuebla.edu.mx</p>
                    <p class="card-text">Teléfono: 2223175845</p>
                </div>
            </div>
            <div class="card mt-3 mb-5">
                <div class="card-body">
                    <h5 class="card-title">Soporte Técnico - Angel</h5>
                    <p class="card-text">Correo electrónico: utp0150895@alumno.utpuebla.edu.mx</p>
                    <p class="card-text">Teléfono: 2223175845</p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
        <div class="container">
            <p>&copy; 2024 Curso de Recta Numérica</p>
        </div>
    </footer>

