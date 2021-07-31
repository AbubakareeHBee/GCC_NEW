<?php

#Online server connection
#comment while on local
// $hostname_gcc = "localhost";
// $database_gcc = "steazhex_gcc";
// $username_gcc = "steazhex_gcc";
// $password_gcc = "14)(Ya1y5*AT";
// $gcc = mysqli_connect($hostname_gcc, $username_gcc, $password_gcc, $database_gcc) or trigger_error(mysql_error(),E_USER_ERROR); 

#local server connection
#comment the below code before pushing to git
$hostname_gcc = "localhost";
$database_gcc = "gcc";
$username_gcc = "root";
$password_gcc = "";
$gcc = mysqli_connect($hostname_gcc, $username_gcc, $password_gcc, $database_gcc) or trigger_error(mysql_error(),E_USER_ERROR); 

?>