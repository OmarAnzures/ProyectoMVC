<?php
require __DIR__ . '/../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Datos de conexión a la base de datos
$servername = "localhost"; // Nombre del servidor
$username = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$database_db = "nolascoproducto"; // Nombre de la base de datos

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database_db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo electrónico del formulario
    $email = $_POST['email'];

    // Consultar la base de datos para verificar si el correo electrónico existe
    $sql = "SELECT correo FROM adminusuarios WHERE correo = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El correo electrónico existe en la base de datos, procede con el envío del correo electrónico
        // Generar un token único para restablecer la contraseña
        $token = md5(uniqid(rand(), true));

        // Guardar el token en la base de datos asociado al correo electrónico del usuario
        $sql_update_token = "UPDATE adminusuarios SET token = '$token' WHERE correo = '$email'";
        $conn->query($sql_update_token);

        // Crear una nueva instancia de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configurar el servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'utp0150894@alumno.utpuebla.edu.mx'; // Tu dirección de correo electrónico de Gmail
            $mail->Password = 'vbfpuxcfhhtcgbzc'; // Tu contraseña de Gmail
            $mail->SMTPSecure = 'tls'; // Usar TLS para una conexión segura
            $mail->Port = 587; // Puerto SMTP de Gmail para TLS

            // Desactivar la verificación del certificado SSL/TLS
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            // Configurar el remitente
            $mail->setFrom('utp0150894@alumno.utpuebla.edu.mx', 'Tu Nombre');

            // Configurar el destinatario
            $mail->addAddress($email);

            // Configurar el asunto y el cuerpo del correo electrónico
            $mail->Subject = "Recuperación de contraseña";
            $mail->Body = "Hola,\n\nHemos recibido una solicitud para restablecer la contraseña de tu cuenta. 
            Para continuar con el proceso, haz clic en el siguiente enlace:\n\nhttp://localhost/Nolas/vista/cambiarpassw.php?email=$email&token=$token\n\nSi no has solicitado este cambio, puedes ignorar este correo.\n\nSaludos,\nTu equipo de soporte";
            
            // Enviar el correo electrónico
            $mail->send();
            
            echo 'El correo electrónico se envió correctamente. Revisa tu bandeja de entrada para restablecer tu contraseña.';
        } catch (Exception $e) {
            echo 'Error al enviar el correo electrónico: ', $mail->ErrorInfo;
        }
    } else {
        // El correo electrónico no existe en la base de datos, redireccionar al formulario de recuperación
        header("Location: formulario_recuperacion.php");
        exit();
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
