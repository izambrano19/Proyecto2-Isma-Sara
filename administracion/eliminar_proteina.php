<?php 
    include_once('connexiosaraismabbdd.php');

if(!empty($_POST)){
    $id_proteina = $_POST["id_proteina"];
    
    $sql_delete = mysqli_query($conexion, "DELETE FROM tproteinas WHERE IDProteina = $id_proteina");

if($sql_delete){
    header("location: listado_proteinas.php");
}else{
    echo "ERROR AL ELIMINAR";
}

}else{

}


 if(empty($_REQUEST['id_proteina'])){
    header("location: listado_proteinas.php");
   }
   else{

    $id_proteina = $_REQUEST['id_proteina'];

    $sql = mysqli_query($conexion, "SELECT Nombre, IDProteina FROM tproteinas WHERE IDProteina = $id_proteina");

    $resultado = mysqli_num_rows($sql);


    if($resultado > 0){

        while ($row = mysqli_fetch_assoc($sql)) {

            $id_proteina = $row["IDProteina"];
            $nombre = $row["Nombre"];
        }
    }else{
        header("location: listado_proteinas.php");
    }

   }

?>

<?php
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
    <h2>¿Estás seguro de eliminar esta proteína?</h2>

    <p>ID Proteina: <?php echo $id_proteina ?></p>
    <p>Nombre: <?php echo $nombre ?></p>
    
    <form method="post" action="">
        <a href="listado_proteinas.php" class="btn_cancel">Cancelar</a>
        <input type="submit" value="Aceptar" class="btn_ok">
        <input type="hidden" name="id_proteina" value="<?php echo $id_proteina; ?>">

    </form>

</div>



</body>
</html>
