<?php
$host = "localhost";
$database = "saraismabbdd";
$user = "IsmaelSara";
$password = "12345678";
$conexion = mysqli_connect($host, $user, $password,$database);
define('NUM_ITEMS_BY_PAGE', 6);
if (!$conexion) die("No ha podido realizarse la conexión".mysqli_connect_error());
else 
?>