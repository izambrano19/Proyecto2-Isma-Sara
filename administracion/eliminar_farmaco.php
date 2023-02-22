<?php 
    include_once('connexiosaraismabbdd.php');

if(!empty($_POST)){
    $id_farmaco = $_POST["id_farmaco"];
    
    $sql_delete = mysqli_query($conexion, "DELETE FROM tfarmacos WHERE IDFarmaco = $id_farmaco");

if($sql_delete){
    header("location: listado_farmacos.php");
}else{
    echo "ERROR AL ELIMINAR";
}

}else{

}


 if(empty($_REQUEST['id_farmaco'])){
    header("location: listado_farmacos.php");
   }
   else{

    $id_farmaco = $_REQUEST['id_farmaco'];

    $sql = mysqli_query($conexion, "SELECT Nombre, IDFarmaco FROM tfarmacos WHERE IDFarmaco = $id_farmaco");

    $resultado = mysqli_num_rows($sql);


    if($resultado > 0){

        while ($row = mysqli_fetch_assoc($sql)) {

            $id_farmaco = $row["IDFarmaco"];
            $nombre = $row["Nombre"];
        }
    }else{
        header("location: listado_farmacos.php");
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
    <h2>¿Estás seguro de eliminar este fármaco?</h2>

    <p>ID Farmacos: <?php echo $id_farmaco ?></p>
    <p>Nombre: <?php echo $nombre ?></p>
    
    <form method="post" action="">
        <a href="listado_farmacos.php" class="btn_cancel">Cancelar</a>
        <input type="submit" value="Aceptar" class="btn_ok">
        <input type="hidden" name="id_farmaco" value="<?php echo $id_farmaco; ?>">

    </form>

</div>





</body>
</html>