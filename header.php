<?php
include_once('connexiosaraismabbdd.php');

session_start();

$sql="SELECT NombreUsuario, Password, Tipo FROM tusuario";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    
    while($row = mysqli_fetch_assoc($resultado)) {

        $nombreUsuario = $row["NombreUsuario"];
        $tipo = $row["Tipo"];

        if(isset($_SESSION["usuario"])){

            if($_SESSION["usuario"] == $nombreUsuario){
                $tipoActual = $tipo;
            }
        }
    }
}
else echo "0 filas";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- TIPO DE LETRA ROBOTO-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">



    <link rel="stylesheet" href="css/estilo.css">
    <link rel=”stylesheet” href=”https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css”>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
    <title>Nais</title>
    <link rel="shorcut icon" type="image/png" href="img/favicon.png">

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        .icono-cerrarsesion{
            width: 30px;
            display: flex;
        }
        </style>
    <header>
        <div class="container_menu">
            <div class="logo">
                <a href="index.php"><img src="img/logo-1def.png"></a>
            </div>

            <div class="menu">
                <i class="fas fa-bars" id="btn_menu"></i>
                <div id="back_menu"></div>
                <nav id="nav">
                    <div id="logo2">
                        <a href="index.php"><img src="img/logo-1def.png"></a>
                    </div>
                    <ul id="menu-nav">
                        <li><a href='index.php' id='selected'>HOMEPAGE</a></li>
                        <li><a href="statistics.php">STATISTICS</a></li>
                        <li><a href="proteins.php">PROTEINS</a></li>
                        <li><a href="drugs.php">PHARMACS</a></li>
 
                        <script>
                            
                            $(document).ready(function() {

                                let comprobarSesion = '<?php echo isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : 0; ?>';
                                let tipo = '<?php echo isset($tipoActual) ? $tipoActual : 0; ?>';

                                if(comprobarSesion != 0){

                                    if(tipo == "admin"){
                                        console.log("admin");
                                        $("ul").append($("<li><a href='createUser.php'>CREATE USER</a></li>"));

                                    }
                                    else if(tipo == "editor"){
                                        console.log("editor");
                                    }
                                    $("ul").append($("<li><a href='cerrar-sesion.php'><img class='icono-cerrarsesion' src='img/iconos/icono-cerrarsesion.png'></a></li>"));

                                }
                                else{
                                    /*
                                    $("ul").append($("<li><a href='login.php'>LOG IN</a></li>"));
                                    */
                                }
   
                            })

                         </script>

                    </ul>

                </nav>

            </div>

        </div>
    </header>

    <script src="js/script.js"></script>