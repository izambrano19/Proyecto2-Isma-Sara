<?php 
    include_once('connexiosaraismabbdd.php');

if(!empty($_POST)){
    $id_proteina = $_POST["id_proteina"];
    
    $sql_delete = mysqli_query($conexion, "DELETE FROM tproteinas WHERE IDProteina = $id_proteina");

if($sql_delete){
    header("location: proteinas.php");
}else{
    echo "ERROR AL ELIMINAR";
}

}else{

}

require("header.php");

 if(empty($_REQUEST['id_proteina'])){
    header("location: proteinas.php");
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
        header("location: proteinas.php");
    }

   }

?>

<?php
?>

    <div style="margin-top: 100px"></div>
<br>

<div class="eliminar_proteina_farmaco">
    <h2>¿Estás seguro de eliminar esta proteína?</h2>

    <p>ID Proteina: <?php echo $id_proteina ?></p>
    <p>Nombre: <?php echo $nombre ?></p>
    
    <form method="post" action="">
        <a href="proteinas.php" class="btn_cancel">Cancelar</a>
        <input type="submit" value="Aceptar" class="btn_ok">
        <input type="hidden" name="id_proteina" value="<?php echo $id_proteina; ?>">

    </form>

</div>




<?php require("footer.php")?>
