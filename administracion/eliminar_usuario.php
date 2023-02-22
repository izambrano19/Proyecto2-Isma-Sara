<?php 
    include_once('connexiosaraismabbdd.php');

if(!empty($_POST)){
    $dni_usuario = $_POST["DNI"];
    
    $sql_delete = mysqli_query($conexion, "DELETE FROM tusuario WHERE DNI = '$dni_usuario'");

if($sql_delete){
    header("location: listado_usuarios.php");
}else{
    echo "ERROR AL ELIMINAR";
}

}


 if(empty($_REQUEST['DNI'])){
    header("location: listado_usuarios.php");
   }
   else{

    $dni_usuario = $_REQUEST['DNI'];

    $sql = mysqli_query($conexion, "SELECT NombreUsuario, DNI, Tipo FROM tusuario WHERE DNI = '$dni_usuario'");

    $resultado = mysqli_num_rows($sql);


    if($resultado > 0){

        while ($row = mysqli_fetch_assoc($sql)) {

            $dni_usuario = $row["DNI"];
            $nombre = $row["NombreUsuario"];
            $tipo = $row["Tipo"];

        }
    }else{
        header("location: listado_usuarios.php");
    }

   }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once("scripts.php")?>
</head>
<body>
    <?php include_once("header.php")?>
<br>
<br>
<br>




    <div style="margin-top: 100px"></div>
<br>

<div class="eliminar_proteina_farmaco">
    <h2>¿Estás seguro de eliminar este usuario?</h2>

    <p>DNI: <?php echo $dni_usuario ?></p>
    <p>Nombre: <?php echo $nombre ?></p>
    <p>Tipo: <?php echo $tipo ?></p>

    
    <form method="post" action="">
        <a href="listado_usuarios.php" class="btn_cancel">Cancelar</a>
        <input type="submit" value="Aceptar" class="btn_ok">
        <input type="hidden" name="DNI" value="<?php echo $dni_usuario; ?>">

    </form>

</div>


</body>

</html>

