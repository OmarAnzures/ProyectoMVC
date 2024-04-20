<?php
// Verificar si se recibió el ID del usuario a eliminar
if(isset($_POST['id'])) {
    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "nolascoproducto");
    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Sanitizar el ID del usuario
    $id = mysqli_real_escape_string($conexion, $_POST['id']);

    // Consulta para eliminar el usuario
    $consulta = "DELETE FROM adminusuarios WHERE id = '$id'";
    if(mysqli_query($conexion, $consulta)) {
        echo "Eliminado exitosamente";
    } else {
        echo "Error al eliminar usuario: " . mysqli_error($conexion);
    }

    // Cerrar conexión
    mysqli_close($conexion);
} else {
    echo "ID de usuario no recibido";
}
?>
