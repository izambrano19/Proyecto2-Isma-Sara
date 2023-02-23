<?php
session_start();
if(empty($_SESSION['activo'])){
    header("location: login.php");
}
?>

    <header>

    <div class="header">
        <h1>ADMINISTRACIÓN</h1>
        
        <div style="display: flex">

            <li><h1><?php echo $_SESSION['nombre'] ,' - ', $_SESSION['tipo']?></h1> </li>
            <li><a class="salir" href="salir.php"><i class="fa-solid fa-power-off"></i></a></li>
        </div>
        
    </div>
        <?php include_once("nav.php") ;?>

    </header>
