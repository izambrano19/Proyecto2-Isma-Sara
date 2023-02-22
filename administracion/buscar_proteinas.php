
<?php include_once('connexiosaraismabbdd.php'); ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once("scripts.php")?>
</head>
<body>
    <?php include_once("header.php")?>

<?php

 $busqueda = strtolower($_REQUEST['busqueda']);

 if(empty($busqueda)){
  header("location: listado_proteinas.php");
 }


?>
<!-- BARRA DE NAVEGACION -->

<div class="container">
  <div class="container_arriba">
    <div style="display: flex">
<h1>LISTADO DE PROTEÍNAS</h1>
<a href="crear_proteina.php" class="btn_nuevo"><i class="fa-solid fa-user-plus"></i>&nbsp CREAR PROTEÍNA</a>
</div>
<form action="buscar_proteinas.php" class="form_busqueda"  method="get" name="formu">

    <div style="display: flex">
      <input id="busqueda" name="busqueda" type="text" placeholder="Buscar" class="input_busqueda" value="<?php echo $busqueda; ?>"/>
      <input type="submit" value="buscar" class="btn_busqueda"/>
  </div>

</form>

</div>
<?php

  /* PAGINADOR */

  $sql_registro = mysqli_query($conexion, "SELECT COUNT(*) as total_registro FROM tproteinas 
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

  $sql = mysqli_query($conexion, "SELECT * FROM tproteinas 
  WHERE Nombre LIKE '%$busqueda%'
  ORDER BY Nombre ASC LIMIT $desde,$por_pagina 
  ");
  
  $resultado= mysqli_num_rows($sql);

  if($resultado > 0){

    ?>
    <table>
      <tr>
        <th>IDProteina</th>
        <th>Nombre</th>
        <th>CodigoApp</th>
        <th>Fecha</th>
        <th>NombreFichero</th>
        <th>TipoFichero</th>
        <th>Especie</th>
        <th>Metodo</th>
        <th>Resolucion</th>
        <th>Acciones</th>
      </tr>
    
    <?php

    while ($row = mysqli_fetch_assoc($sql)) {

      $id_proteina = $row["IDProteina"];
      $nombre = $row["Nombre"];
      $codigoApp = $row["CodigoApp"];
      $fecha = $row["Fecha"];
      $nombreFichero = $row["NombreFichero"];
      $tipoFichero = $row["TipoFichero"];
      $especie = $row["Especie"];
      $metodo = $row["Metodo"];
      $resolucion = $row["Resolucion"];
  
      ?>

      <tr>
        <td><?php echo $id_proteina; ?></td>
        <td><?php echo $nombre; ?></td>
        <td><?php echo $codigoApp; ?></td>
        <td><?php echo $fecha; ?></td>
        <td><?php echo $nombreFichero; ?></td>
        <td><?php echo $tipoFichero; ?></td>
        <td><?php echo $especie; ?></td>
        <td><?php echo $metodo; ?></td>
        <td><?php echo $resolucion; ?></td>
        <td>
          <a class="link_editar" href="editar_proteina.php?id_proteina=<?php echo $id_proteina;?>">EDITAR</a>
          |
          <a class="link_eliminar" href="eliminar_proteina.php?id_proteina=<?php echo $id_proteina;?>">ELIMINAR</a>  
        </td>
      </tr>
      
      
      <?php

      }
    }
    else 
{
  echo "<h3 style='text-align:-webkit-center'>No encontrado</h3>";
}
    ?>

</table>
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
      echo "<li><a href='?pagina=".$i."&busqueda=".$busqueda."'>$i</a></li>";
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