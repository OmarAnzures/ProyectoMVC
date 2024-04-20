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
    <title>Tema 1</title>
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

<div class="container mt-5 mb-5">
        <h2>¡Bienvenido a nuestros emocionantes Quiz sobre la recta numérica!</h2>
            <p>
                En esta sección, podrás poner a prueba tus habilidades en una variedad de temas relacionados con la recta numérica. Desde operaciones básicas hasta comparación de números, fracciones y decimales, cada Quiz te desafiará a profundizar en tu comprensión y dominio de este importante concepto matemático. ¡Prepárate para expandir tus conocimientos y mejorar tus habilidades con nuestros desafiantes Quiz sobre la recta numérica!

            </p>
</div>

<?php
$email = $_SESSION["email"];

include_once($_SERVER['DOCUMENT_ROOT'] . '/Nolas/conexion/conexion.php');

$result = mysqli_query($conn, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
?>

<div class="container mt-0">
    <div class="panel">
        <div class="table-responsive">
            <table class="table table-striped table-bordered title1">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">S.N.</th>
                        <th scope="col">Temática</th>
                        <th scope="col">Total de Preguntas</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $c = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $title = $row['titulo'];
                        $total = $row['total_preguntas'];
                        $sahi = $row['valor_buenas'];
                        $eid = $row['idquiz'];
                        $desc = $row['tag'];
                        $q12 = mysqli_query($conn, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error98');
                        $rowcount = mysqli_num_rows($q12);

                        echo '<tr';
                        if ($rowcount != 0) {
                            echo ' style="color:#99cc32"';
                        }
                        echo '>
                            <td>' . $c++ . '</td>
                            <td>' . $title . '</td>
                            <td>' . $total . '</td>
                            <td>' . $desc . '</td>

                            <td>';

                        if ($rowcount == 0) {
                            echo '<b><a href="../vista/quiz/questions_quiz.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '" class="btn btn-success">Examen</a></b>';
                        } else {
                            echo '<b><a href="update.php?q=quizre&step=25&eid=' . $eid . '&n=1&t=' . $total . '" class="btn btn-danger">Otra vez</a></b>';
                        }

                        echo '</td>
                            </tr>';
                    }
                    $c = 0;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
</body>
</html>


