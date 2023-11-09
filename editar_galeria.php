<!DOCTYPE html>
<html>
<head>
    <title>Editar Galeria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        form {
            text-align: center;
        }

        input[type="text"], input[type="file"], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .edit-button {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Editar Foto De La Galeria</h1>
    <?php
// Verificar si se ha enviado un ID de servicio
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "TiC0ntr4#";
    $database = "barrif";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    if (isset($_POST['submit'])) {
        // Recuperar los datos del formulario
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        // Verificar si se cargó una nueva imagen
        if ($_FILES['imagen']['name'] !== '') {
            // Procesar la nueva imagen (puedes agregar validación y almacenamiento aquí)
            $imagen = $_FILES['imagen']['name'];
            $imagen_temp = $_FILES['imagen']['tmp_name'];

            // Mueve la imagen a la ubicación deseada
            move_uploaded_file($imagen_temp, 'Gallery/' . $imagen);

            // Actualizar la base de datos con la nueva imagen
            $sql = "UPDATE galeria SET titulo = '$titulo', descripcion = '$descripcion', imagen = '$imagen' WHERE id = $id";
        } else {
            // No se cargó una nueva imagen, actualizar solo título y descripción
            $sql = "UPDATE galeria SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = $id";
        }

        if ($conn->query($sql) === TRUE) {
            echo '<script>
            alert("Los cambios se guardaron correctamente.");
            window.location.href = "lista_fotos.php";
            </script>';
            exit();
        } else {
            echo "Error al guardar los cambios: " . $conn->error;
        }
    }

    // Consulta SQL para recuperar los datos de la foto con el ID especificado
    $sql = "SELECT * FROM galeria WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<form method="post" enctype="multipart/form-data">';
        echo '<input type="text" name="titulo" value="' . $row["titulo"] . '" placeholder="Título" required><br>';
        echo '<textarea name="descripcion" placeholder="Descripción" required>' . $row["descripcion"] . '</textarea><br>';
        echo '<input type="file" name="imagen" accept="image/*"><br>';
        echo '<input type="submit" value="Guardar cambios" name="submit" class="edit-button">';
        echo '</form>';
    } else {
        echo "No se encontró el servicio.";
    }

    $conn->close();
} else {
    echo "ID de servicio no especificado.";
}
?>

</body>
</html>
