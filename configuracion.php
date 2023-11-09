<?php
// Database credentials
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'TiC0ntr4#');
define('DB_NAME', 'barrif');
 
// Attempt to connect to the database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("Error: No se pudo hacer la conexión a la base de datos." . mysqli_connect_error());
}
?>

