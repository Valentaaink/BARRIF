<!DOCTYPE html>
<html>
<head>
    <!-- ======== Favicon ======= -->
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon" />
    <title>Editar Servicio ! Barrif</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        .container {
            text-align: center; /* Centra horizontalmente */
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        .edit-button {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
        }
        .admin-button {
            margin: auto;
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Editar Servicio</h1>
    <div class="container">
        <a href="administradores.php" class="admin-button">Inicio</a>
    </div>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Acción</th>
        </tr>
        <?php
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "TiC0ntr4#";
        $database = "barrif";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta SQL para recuperar los datos de la tabla servicios
        $sql = "SELECT id, imagen, titulo, descripcion FROM servicios";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["imagen"] . "</td>";
                echo "<td>" . $row["titulo"] . "</td>";
                echo "<td>" . $row["descripcion"] . "</td>";
                echo '<td><a class="edit-button" href="editar_servicio.php?id=' . $row["id"] . '">Editar</a></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No se encontraron servicios.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
