<?php
session_start();
if(empty($_SESSION['activo'])){
    header("location: login.php");
}
?>

    <header>

    <div class="header">
        <h1>ADMINISTRACIÓN</h1>
        <li><a class="salir" href="salir.php">SALIR</a></li>

        </div>
        <?php include_once("nav.php") ;?>

    </header>