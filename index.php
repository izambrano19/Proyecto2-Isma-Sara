<?php
        session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="index.html"><img src="img/logo-2def.png"></a>
            </div>

            <div class="menu">
                <i class="fas fa-bars" id="btn_menu"></i>
                <div id="back_menu"></div>
                <nav id="nav">
                    <div id="logo2">
                        <a href="Nais.html"><img src="img/logo-2def.png"></a>
                    </div>
                    <ul>
                        <li><a href='index.html' id='selected'>HOMEPAGE</a></li>
                        <li><a href="statistics.html">STATISTICS</a></li>
                        <li><a href="proteins.html">PROTEINS</a></li>
                        <li><a href="drugs.html">PHARMACS</a></li>
                        <li><a href="createUser.html">CREATE USER</a></li>
 
                        <script>
                            $(document).ready(function() {

                                let comprobarSesion = '<?php echo isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : 0; ?>';

                                if(comprobarSesion != 0){
                                    $("ul").append($("<li><a href='cerrar-sesion.php'><img class='icono-cerrarsesion' src='img/iconos/icono-cerrarsesion.png'></a></li>"));
                                }
                                else{
                                    /*
                                    $("ul").append($("<li><a href='login.html'>LOG IN</a></li>"));
                                    */
                                }
   
                            })
                          

                         </script>

                    </ul>


                </nav>

            </div>


        </div>
    </header>

    <main>
        <div class="container__cover">
            <div class="container_parrafo">
            <p>AL LADO DE LA CIENCIA</p>
            <p>DE LA MANO DE GRANDES</p>
            <p>CIENTÍFICOS</p>
        </div>
        </div>
    </main>
    <script src="js/script.js"></script>

    <div class="containerComunes1">
        <h2>NOTICIAS</h2>

        <div class="container1">
            <img src="img/noticias2/c1.jpg" alt="Imagen-1">
            <img src="img/noticias2/c2.jpg" alt="Imagen-2">
            <img src="img/noticias2/c3.jpeg" alt="Imagen-3">

        </div>
    </div>
    <div class="containerComunes2">

        <h2>NOTICIAS</h2>

        <div class="container2">
            <img src="img/noticias/biomedicina1.jpg" alt="Noticias">
            <img src="img/noticias/biomedicina2.jpg" alt="Noticias">

        </div>

        <div class="containerp">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris viverra id lacus id aliquam. Nunc enim massa, cursus dignissim diam a, pharetra dictum augue. Mauris non lacus rhoncus, bibendum odio ultrices, sodales diam. In ornare, metus eu suscipit venenatis, ligula tellus euismod dui, auctor iaculis dolor ante vitae tortor. Fusce pellentesque ac arcu vitae bibendum. Aliquam nec ex vitae erat vehicula facilisis. Proin dapibus nisi ut nulla tempor pretium. Aliquam eu magna eget metus commodo eleifend sed at enim. Morbi ornare posuere purus</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris viverra id lacus id aliquam. Nunc enim massa, cursus dignissim diam a, pharetra dictum augue. Mauris non lacus rhoncus, bibendum odio ultrices, sodales diam. In ornare, metus eu suscipit venenatis, ligula tellus euismod dui, auctor iaculis dolor ante vitae tortor. Fusce pellentesque ac arcu vitae bibendum. Aliquam nec ex vitae erat vehicula facilisis. Proin dapibus nisi ut nulla tempor pretium. Aliquam eu magna eget metus commodo eleifend sed at enim. Morbi ornare posuere purus</p>

        </div>
    </div>

    <footer class="pie-pagina">

        <div class="grupo-1">

            <div class="box">
                <figure>
                    <a href="#">
                        <img src="img/logo-1def.png" alt="Logo NAIS">
                    </a>
                </figure>
            </div>

            <div class="box">
                <h2>INFORMACIÓN DE CONTACTO</h2>
                <p>UBICACIÓN: C/XXX XX XXXX</p>
                <p>TELÉFONO: XXX XX XX XX</p>
                <p>CORREO: XXXXXXX@XXXXXX</p>
            </div>

            <div class="box">
                <h2>NORMATIVA LEGAL</h2>
                <p>PROTECCIÓN DE DATOS</p>
                <p>POLÍTICA DE COOKIES</p>
                <p>AVISO LEGAL</p>
            </div>
        </div>

        <div class="grupo-2">
            <small>&copy; 2022 <b>NaIs</b> - Todos los Derechos Reservados.</small>
        </div>

    </footer>


</body>

</html>
