<?php

ini_set('display_errors', 0); 
ini_set('display_startup_errors', 0); 
error_reporting(E_ALL);

// $hostname_gcc = "localhost";
// $database_gcc = "steazhex_gcc";
// $username_gcc = "steazhex_gcc";
// $password_gcc = "14)(Ya1y5*AT";
// $gcc = mysqli_connect($hostname_gcc, $username_gcc, $password_gcc, $database_gcc) or trigger_error(mysqli_error($gcc),E_USER_ERROR); 



#loca server connection
$hostname_gcc = "localhost";
$database_gcc = "gcc";
$username_gcc = "root";
$password_gcc = "";
$gcc = mysqli_connect($hostname_gcc, $username_gcc, $password_gcc, $database_gcc) or trigger_error(mysqli_error($gcc),E_USER_ERROR); 
?>
