<!DOCTYPE html>
<html>
<head>
    <!-- ======== Favicon ======= -->
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon" />
    <title>Servicios ! Barrif</title>
    <link rel="stylesheet" href="css/style_forms.css">
</head>
<body>
    <h1>Formulario para servicios</h1>
    
    <form action="procesar_formulario_s.php" method="post" enctype="multipart/form-data">
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*" required>
        
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" rows="4" required></textarea>
        
        <input type="submit" value="Guardar Tarjeta">
        <a href="administradores.php" class="admin-button">Inicio</a>
    </form>
</body>
</html>
