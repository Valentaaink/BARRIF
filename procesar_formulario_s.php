<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];

    // Procesar la carga de la imagen
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
        $imagen_nombre = $_FILES["imagen"]["name"];
        $imagen_temp = $_FILES["imagen"]["tmp_name"];

        // Mover la imagen al directorio de destino (puedes ajustar la ubicación según tus necesidades)
        $ruta_destino = "Imagenes/" . $imagen_nombre;
        move_uploaded_file($imagen_temp, $ruta_destino);
    } else {
        // Manejar errores de carga de imágenes si es necesario
        echo "Error al cargar la imagen. Asegúrate de seleccionar un archivo de imagen válido.";
        exit;
    }

    // Conexión a la base de datos (ajusta estos valores según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "TiC0ntr4#";
    $database = "barrif";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO servicios (imagen, titulo, descripcion) VALUES ('$ruta_destino', '$titulo', '$descripcion')";
    
    if ($conn->query($sql) === TRUE) {
        echo '<script>
            alert("La tarjeta de servicio se creo correctamente.");
            window.location.href = "lista_servicio.php";
            </script>';
            exit();
    } else {
        echo "Error al guardar la tarjeta: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Acceso no autorizado.";
}

// Redirigir de nuevo al formulario
header("Location: form_servicios.php");
?>
