<?php
session_start();
if(empty($_SESSION['activo'])){
    header("location: login.php");
}
?>

    <header>
        <h1>ADMINISTRACIÓN</h1>
        <?php include_once("nav.php") ;?>


    </header>
