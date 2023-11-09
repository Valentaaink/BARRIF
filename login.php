<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: administradores.php");
  exit;
}

// Include config file
require_once "configuracion.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, nombre_de_usuario, contraseña FROM administradores WHERE nombre_de_usuario = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            // No es necesario llamar a session_start() aquí
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirige el usuario al inicio del sitio web
                            header("location: administradores.php");
                            exit; // Asegura que no se procese más código después de la redirección
                        } else {
                            // Despliega un mensaje de error si los datos de sesión no son válidos
                            $password_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else {
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BARRIF</title>
    <link rel="icon" href="Imagenes/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif;  background-image: url("");}
        .wrapper{ width: 350px; padding: 20px; align: center; font: 14px sans-serif; color: black; margin: auto;
            background-color: white; }
        /* Estilos adicionales según sea necesario */
        .password-container {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: green;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Iniciar Sesión</h2><br>
        <p>Por favor, ingrese sus datos para iniciar sesión.</p><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Nombre de usuario</label>
                <input type="text" name="username" class="form-control" placeholder="Escribe tu nombre de usuario" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <div class="password-container">
                    <input type="password" name="password" class="form-control" placeholder="Escribe tu contraseña" id="password-field">
                    <i class="toggle-password fas fa-eye toggle-password" onclick="togglePasswordVisibility()"></i>
                </div>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
            </div>
            <p>¿No tienes una cuenta? <a href="registraradmin.php">Regístrate ahora</a>.</p>
            <a href="index.html">Volver al sitio</a>
        </form>
    </div>
    
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password-field');
            const fieldType = passwordField.type;

            // Cambia el tipo de campo de contraseña a texto o viceversa
            passwordField.type = (fieldType === 'password') ? 'text' : 'password';
        }
    </script>
</body>
</html>
