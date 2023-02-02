<?php 
include_once('connexiosaraismabbdd.php');

$usernameComprobar = $_POST['username'];
$passwordComprobar = $_POST['password'];

$sql="SELECT IDUsuario, NombreUsuario, Password, Tipo FROM tusuario";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    
    while($row = mysqli_fetch_assoc($resultado)) {
        
        $IDUsuario = $row["IDUsuario"];
        $nombreUsuario = $row["NombreUsuario"];
        $password = $row["Password"];
        $tipo = $row["Tipo"];
    
        if($nombreUsuario === $usernameComprobar && $password === $passwordComprobar){

        session_start();
    
        $_SESSION["usuario"] = $usernameComprobar;
        header("Location: pagina-secreta.php");
        echo"<script>console.log('si entra');</script>";

        
    }else{
        header("Location: pagina-secreta.php");
        echo"<script>console.log('no entra');</script>";
    }
 
    }
}
else echo "0 filas";




mysqli_close($conexion); //cierra la BBDD


?>