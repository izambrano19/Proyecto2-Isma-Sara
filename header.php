<?php
include_once('connexiosaraismabbdd.php');

session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Z.MedProteins</title>
    
    <link rel="stylesheet" href="css/pdcc.min.css"/>

    <script src="js/pdcc.min.js"></script>
    
    <script type="text/javascript">
    PDCookieConsent.config({
        "defaultLang" : "es",
        "brand": {
            "dev" : false,
            "name": "Z.MedProteins",
            "url" : "https://projectedawilg3.cat/",
            "websiteOwner" : "Z.MedProteins"
        },
        "cookiePolicyLink": "http://localhost/cookies.php",
        "hideModalIn": ["http://localhost/cookies.php"],
        "styles": {
            "primaryButton": {
                "bgColor" : "#99e0ff",
                "txtColor": "#000000"
            },
            "secondaryButton": {
                "bgColor" : "#EEEEEE",
                "txtColor": "#333333"
            }
        }
    });
    
    PDCookieConsent.blockList([
        {
            "contain" : ": Google",
             "name" : "Google",
             "actived" : true,
             "editable" : false,
             "visible" : false
        }
        
    ]);

    
    </script>
    
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9F8Z6B6PKV"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-9F8Z6B6PKV');
    </script>

    <!-- TIPO DE LETRA ROBOTO-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- PAGINA DE ESTILOS -->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel=”stylesheet” href=”https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css”>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
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
                        <li><a href="proteinas.php">PROTEINAS</a></li>
                        <li><a href="farmacos.php">FÁRMACOS</a></li>
                        <li><a href="administracion/login.php">LOGIN</a></li>
                    </ul>

                </nav>

            </div>

        </div>
    </header>

    <script src="js/script.js"></script>