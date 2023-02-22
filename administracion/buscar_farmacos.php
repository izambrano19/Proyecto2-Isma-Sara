<?php include_once('connexiosaraismabbdd.php'); ?>


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


        <h2 style="text-align: center">FÁRMACOS</h2>
<br>
<?php

 $busqueda = strtolower($_REQUEST['busqueda']);

 if(empty($busqueda)){
  header("location: listado_farmacos.php");
 }


?>
<!-- BARRA DE NAVEGACION -->

<form action="buscar_farmacos.php" class="form_container"  method="get" name="formu">

<div class="field" id="searchform">
  <input class="inputs" id="busqueda" name="busqueda" type="text" placeholder="Coloca un fármaco" value="<?php echo $busqueda; ?>"/>
  <button type="submit" value="buscar"><img class="iconSearch" src="https://img.icons8.com/material-outlined/256/search.png"></button>
</div>
</form>

<div class="containerBotonItems">
  <input class="botonItems" type="button" value="NEW ITEM">
  <input class="botonItems" type="button" value="MY ITEM">
</div>

<div class='containerProteinas'> 

<?php

  /* PAGINADOR */

  $sql_registro = mysqli_query($conexion, "SELECT COUNT(*) as total_registro FROM tfarmacos
  WHERE Nombre LIKE '%$busqueda%'");

  $resultado_registro = mysqli_fetch_assoc($sql_registro);
  $total_registro = $resultado_registro['total_registro'];

  $por_pagina = 5;

  if(empty($_GET['pagina'])){
    $pagina = 1;
  }else{
    $pagina = $_GET['pagina'];
  }

  $desde = ($pagina -1) * $por_pagina;
  $total_paginas = ceil($total_registro / $por_pagina);

  $sql = mysqli_query($conexion, "SELECT * FROM tfarmacos 
  WHERE Nombre LIKE '%$busqueda%'
  ORDER BY Nombre ASC LIMIT $desde,$por_pagina 
  ");
  
  $resultado= mysqli_num_rows($sql);

  if($resultado > 0){

    while ($row = mysqli_fetch_assoc($sql)) {
      
      $id_farmaco = $row["IDFarmaco"];
      $nombre = $row["Nombre"];
      $codigoApp = $row["CodigoApp"];
      $fecha = $row["Fecha"];
      $nombreFichero = $row["NombreFichero"];
      $tipoFichero = $row["TipoFichero"];
      $smiles = $row["Smiles"];
      $inChl = $row["InChl"];
      $estado = $row["Estado"];
  
      echo "IDProteina: .$id_farmaco.";
      echo "Nombre: .$nombre.";
      echo "CodigoApp: .$codigoApp.";
      echo "Fecha: .$fecha.";
      echo "NombreFichero: .$nombreFichero.";
      echo "TipoFichero: .$tipoFichero.";
      echo "Smiles: .$smiles.";
      echo "InChl: .$inChl.";
      echo "Estado: .$estado.";

      ?>
      <a href="editar_farmaco.php?id_farmaco=<?php echo $id_farmaco; ?>"> EDITAR </a>
      <a href="eliminar_farmaco.php?id_farmaco=<?php echo $id_farmaco; ?>"> ELIMINAR </a>
      <br>
      <?php


      }
    }
    else 
{
  echo "<h3 style='text-align:-webkit-center'>No encontrado</h3>";
}
    ?>
    </div>


    
    <div class="pagination">
  <?php
  if ($pagina > 1) {
    echo "<li><a href='?pagina=".($pagina-1)."&busqueda=".$busqueda."'>Anterior</a></li>";
  }

  for ($i = 1; $i <= $total_paginas; $i++) {
    if ($i == $pagina) {
      echo "<li><a class='pagina-actual'>$i</a></li>";
    } else {
      echo "<li><a href='?pagina=$i.&busqueda=".$busqueda."'>$i</a></li>";
    }
  }

  if ($pagina < $total_paginas) {
    echo "<li><a href='?pagina=".($pagina+1)."&busqueda=".$busqueda."'>Siguiente</a></li>";
  }
  ?>
</div>

<?php


  



mysqli_close($conexion); //cierra la BBDD

?>


<br>

</body>
</html>
