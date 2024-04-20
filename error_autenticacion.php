<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión Requerido</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlaza tu archivo de estilos CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 600px;
            margin: 100px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #343a40;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Inicio de Sesión Requerido</h1>
        <p>Para acceder a esta página, primero debes iniciar sesión.</p>
        <a href="/Nolas/vista/inicio.php" class="btn">Iniciar Sesión</a>
    </div>
</body>
</html>
