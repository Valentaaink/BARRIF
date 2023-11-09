<?php
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include config file
require_once "configuracion.php";

// Define variables and initialize with empty values
$current_password = $new_password = $confirm_password = "";
$current_password_err = $new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate current password
    if (empty(trim($_POST["current_password"]))) {
        $current_password_err = "Por favor, ingrese su contraseña actual.";
    } else {
        $current_password = trim($_POST["current_password"]);

        // Verificar si la contraseña actual es correcta
        $sql = "SELECT contraseña FROM administradores WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if current password exists
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($current_password, $hashed_password)) {
                            // Contraseña actual es correcta
                        } else {
                            $current_password_err = "La contraseña actual es incorrecta.";
                        }
                    }
                } else {
                    $current_password_err = "Error interno. Por favor, vuelva a intentarlo más tarde.";
                }
            } else {
                echo "Algo salió mal, por favor vuelva a intentarlo.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate new password
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter the new password.";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Por favor confirme la contraseña.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Las contraseñas no coinciden.";
        }
    }

    // Check input errors before updating the database
    if (empty($current_password_err) && empty($new_password_err) && empty($confirm_password_err)) {
        // Prepare an update statement
        $sql = "UPDATE administradores SET contraseña = ? WHERE id = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else {
                echo "Algo salió mal, por favor vuelva a intentarlo.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- ======== Favicon ======= -->
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon" />
    <meta charset="UTF-8">
    <title>Contraseñas ! Barrif</title>
    <link rel="icon" href="Imagenes/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif; background-image: url(""); }
        .wrapper{ width: 350px; padding: 20px; align: center; font: 14px sans-serif; color: black; margin: auto; }
        .password-group { position: relative; }
        .password-icon { position: absolute; top: 8px; right: 10px; cursor: pointer; color: blue;}
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Cambia tu contraseña aquí</h2> <br>
        <p>Complete este formulario para restablecer su contraseña.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($current_password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña Actual</label>
                <div class="password-group">
                    <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Escribe la contraseña actual" value="<?php echo $current_password; ?>">
                    <i class="fas fa-eye-slash password-icon" onclick="togglePassword('current_password')"></i>
                </div>
                <span class="help-block"><?php echo $current_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>Nueva contraseña</label>
                <div class="password-group">
                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Escribe tu nueva contraseña" value="<?php echo $new_password; ?>">
                    <i class="fas fa-eye-slash password-icon" onclick="togglePassword('new_password')"></i>
                </div>
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirmar nueva contraseña</label>
                <div class="password-group">
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirmar nueva contraseña">
                    <i class="fas fa-eye-slash password-icon" onclick="togglePassword('confirm_password')"></i>
                </div>
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Guardar cambios">
                <a class="btn btn-link" href="administradores.php">Cancelar</a>
            </div>
        </form>
    </div>

    <script>
        function togglePassword(inputId) {
            var input = document.getElementById(inputId);
            input.type = (input.type === 'password') ? 'text' : 'password';
        }
    </script>
</body>
</html>

