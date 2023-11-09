<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- ======== Favicon ======= -->
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon" />
    <title>Administración ! Barrif</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            background: #f0f0f0;
            min-height: 100vh;
        }

        .admin-panel {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-left: 20px;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .admin-button {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s, transform 0.2s, box-shadow 0.2s;
        }

        .admin-button:hover {
            background-color: #05aef6;
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Estilo para la otra parte de la pantalla */
        .other-content {
    flex: 1;
    background: url('images/1.jpg') center/cover no-repeat;
    min-height: 80vh;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 20px; /* Margen en el lado derecho de la imagen */
}



        .spacer {
            width: 20px; /* Espacio entre la imagen y los botones */
        }
    </style>
</head>
<body>
    <div class="admin-panel">
        <h1>Panel de Administración</h1>
        <a href="form_servicios.php" class="admin-button">Crear Servicio</a>
        <a href="lista_servicio.php" class="admin-button">Editar Servicio</a>
        <a href="form_galeria.php" class="admin-button">Crear Galería</a>
        <a href="lista_fotos.php" class="admin-button">Editar Galería</a>
        <a href="restablecercontraseña.php" class="admin-button">Cambiar Contraseña</a>
        <a href="logout.php" class="admin-button">Cerrar Sesión</a>
    </div>
    <div class="spacer"></div>
    <div class="other-content">
        <!-- Contenido adicional a la derecha de los botones -->
    </div>
</body>
</html>
