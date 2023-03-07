<?php
$host = "projectedawilg3.cat";
$database = "zb5b2zsl_saraismabbdd";
$user = "zb5b2zsl_IsmaelSara";
$password = "proyecto_daw";
$conexion = mysqli_connect($host, $user, $password,$database);
define('NUM_ITEMS_BY_PAGE', 6);
if (!$conexion) die("No ha podido realizarse la conexión".mysqli_connect_error());
else 
?>