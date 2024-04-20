<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["email"])) {
    // Redirigir al usuario a la página de inicio de sesión requerida
    header("Location: /Nolas/vista/error_autenticacion.php");
    exit(); // Asegurar que el resto del código no se ejecute
}
else if(!isset($_SESSION["rol"]) || $_SESSION["rol"] != 1)
{
     // Redirigir al usuario a la página de inicio de sesión requerida
     header("Location: /Nolas/vista/acceso_denegado.php");
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

<style>
      .dropdown-menu .dropdown-item:hover {
            background-color: #343a40; /* Cambia el color de fondo al pasar el mouse */
            color: #ffffff; /* Cambia el color del texto al pasar el mouse */
        }   

        .btn-custom {
            background-color: #343a40; /* Cambia el color de fondo del botón */
            border-color: #343a40; /* Cambia el color del borde del botón */
        }

        .btn-custom:hover {
            background-color: #2c3136; /* Cambia el color de fondo al pasar el mouse */
            border-color: #2c3136; /* Cambia el color del borde al pasar el mouse */
        }
        .dropdown-menu .dropdown-item:hover {
            background-color: #495057; /* Cambia el color de fondo al pasar el mouse */
        }
    
}

</style>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/Nolas/vista/usuarios.php">Academy UTP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-book-open mr-1"></i> Gestión de Usuarios
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-white" href="/Nolas/vista/usuarios.php">Usuarios</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-white" href="/Nolas/vista/administradores.php">Administrador</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-clipboard-list mr-1"></i> Quiz
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-white" href="/Nolas/vista/quiz/quiz_step1.php">Agregar Quiz</a>
                        <a class="dropdown-item text-white" href="/Nolas/vista/quiz/quiz_lista.php">Ver Quiz</a>

                    </div>
                    
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/Nolas/vista/logout.php"><i class="fas fa-sign-out-alt mr-1"></i> Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<div class="container mt-5">
    <h2 class="text-center mb-5">Lista de usuarios</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Correo Electrónico</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Conexión a la base de datos
            $conexion = mysqli_connect("localhost", "root", "", "nolascoproducto");
            if (!$conexion) {
                die("Error al conectar con la base de datos: " . mysqli_connect_error());
            }
            
            // Consulta para obtener los usuarios
            $consulta = "SELECT * FROM adminusuarios WHERE rol = '2'";
            $resultado = mysqli_query($conexion, $consulta);

            // Mostrar usuarios en la tabla
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['id'] . "</td>";
                echo "<td>" . $fila['correo'] . "</td>";
                echo "<td>" . $fila['contrasena'] . "</td>";
                echo "<td><button class='btn btn-danger' onclick='eliminarUsuario(" . $fila['id'] . ")'>Eliminar</button></td>";
                echo "</tr>";
            }

            // Cerrar conexión
            mysqli_close($conexion);
            ?>
        </tbody>
    </table>
</div>


<footer>
        <div class="container">
            <p>&copy; 2024 Curso de Recta Numérica</p>
        </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Enlace al archivo de JavaScript de Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    function eliminarUsuario(id) {
        if (confirm("¿Estás seguro de que quieres eliminar este usuario?")) {
            $.ajax({
                url: '/Nolas/conexion/create_delete_user.php',
                type: 'POST',
                data: {id: id},
                success: function(response) {
                    alert(response);
                    // Actualizar la tabla después de eliminar el usuario
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Error al eliminar usuario: ' + error);
                }
            });
        }
    }
</script>

</body>
</html>
