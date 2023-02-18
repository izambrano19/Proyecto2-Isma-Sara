<?php
session_start();
if(!empty($_SESSION['activo'])){
    header("location: index.php");
}else{


if(!empty($_POST)){
    if(empty($_POST["username"]) || empty($_POST["password"]) ) {
        echo "INGRESA TU USUARIO Y CONTRASEÑA";
    }else{
        include_once('connexiosaraismabbdd.php');
        $user = mysqli_real_escape_string($conexion, $_POST["username"]);
        $pass = md5(mysqli_real_escape_string($conexion, $_POST["password"]));

        $query = mysqli_query($conexion, "SELECT * FROM tusuario WHERE NombreUsuario = '$user' AND Password = '$pass' ");
        $resultado = mysqli_num_rows($query);

        if($resultado > 0){
            $row = mysqli_fetch_assoc($query);
            session_start();
            $_SESSION['activo'] = true;
            $_SESSION['idUsuario'] = $row['IDUsuario'];
            $_SESSION['nombre'] = $row['NombreUsuario']; 
            $_SESSION['tipo'] = $row['Tipo']; 


            header("location: index.php");


        }else{
            echo "EL USUARIO Y LA CONTRASEÑA SON INCORRECTOS";
            session_destroy();
        }
    }
}
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UFT-8">
    <meta http-equiv="X-UA-Compatible" content="width=device-width,
    initial-scale=1.0">
    <meta charset="UTF-8">
    <title>LOG IN</title>
    <link rel="shorcut icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <form action="login.php" id="formulario" method="post">
        <h1 class="title">Log in</h1>
        <label for="username">  
            <i class="fa-solid fa-user"></i>
            <input placeholder="username" type="text" name="username" id="username">
        </label>
        <label>
            <i class="fa-solid fa-lock"></i>
            <input placeholder="password" type="password" name="password" id="password">
        </label>
        <a href="" class="link">Forgot your password?</a>
        <br>
        <input type="submit" value="Iniciar sesión" class="button">

    </form>

    <script src="login.js"></script>
</body>
</html>



