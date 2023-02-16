<?php require("header.php")?>

<?php
include_once('connexiosaraismabbdd.php');

?>

    <div style="margin-top: 100px">
        <h2 style="text-align: center">PROTEINAS</h2>
    </div>
<br>

<!-- BARRA DE NAVEGACION -->

<form action="buscar_proteinas.php" class="form_container"  method="get" name="formu">

  <div class="field" id="searchform">
    <input class="inputs" id="busqueda" name="busqueda" type="text" placeholder="Coloca una proteina" />
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

  $sql_registro = mysqli_query($conexion, "SELECT COUNT(*) as total_registro FROM tproteinas");

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

  $sql = mysqli_query($conexion, "SELECT * FROM tproteinas ORDER BY Nombre ASC LIMIT $desde,$por_pagina
  ");
  
  $resultado= mysqli_num_rows($sql);

  if($resultado > 0){

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

      <div class='containerColProteinas'> 
          <div class='container_Superior'>
              <div class='nombreProteina'>
                  <p> CodeApp: <?php echo"$codigoApp" ?> | Fecha: <?php echo"$fecha" ?> | Nombre: <?php echo"$nombre" ?> </p>
              </div>
<!--              <div class='iconos'>
              <img class='icon_Editar' src='https://img.icons8.com/pastel-glyph/64/null/edit--v1.png'/>
                  <img class='icon_Eliminar' src='https://img.icons8.com/ios-filled/256/delete.png'/>
              </div>

    -->

              <form action="proteinas.php" method="get">
                <div class="iconos">
              <button style="border: 0; background-color: #f0f8ff00" type="submit" name="accion" value="editar"><img class="icon_Editar" src="https://img.icons8.com/pastel-glyph/64/null/edit--v1.png"></button>
              <button style="border: 0; background-color: #f0f8ff00" type="submit" name="accion" value="borrar"><img class="icon_Eliminar" src="https://img.icons8.com/ios-filled/256/delete.png"></button>
              </div>
              <!--
              <input type=submit name=accion value=editar>
              <input type=submit name=accion value=borrar>
    -->
              <!--
              $nombre = $row["Nombre"];
      $codigoApp = $row["CodigoApp"];
      $fecha = $row["Fecha"];
      $nombreFichero = $row["NombreFichero"];
      $tipoFichero = $row["TipoFichero"];
      $especie = $row["Especie"];
      $metodo = $row["Metodo"];
      $resolucion = $row["Resolucion"];

              <input type=hidden name=idproteina value=<?php echo $id_proteina?> >
              <input type=hidden name=idproteina value=<?php echo $id_proteina?> >
              <input type=hidden name=idproteina value=<?php echo $id_proteina?> >
              <input type=hidden name=idproteina value=<?php echo $id_proteina?> >
              <input type=hidden name=idproteina value=<?php echo $id_proteina?> >
              <input type=hidden name=idproteina value=<?php echo $id_proteina?> >
              <input type=hidden name=idproteina value=<?php echo $id_proteina?> >
              <input type=hidden name=idproteina value=<?php echo $id_proteina?> >
              <input type=hidden name=idproteina value=<?php echo $id_proteina?> >
    -->

              </form>

          </div>
          <div class='item'> 
              <img src='img/proteinas/proteina-1.png'>
              <div class='container_info'>
              <p>Identificador: <?php echo"$id_proteina" ?> </p>
                <p>Nombre de fichero: <?php echo"$nombreFichero" ?> </p>
                <p>Tipo de fichero: <?php echo"$tipoFichero" ?> </p>
                <p>Especie: <?php echo"$especie" ?> </p>
                <p>Método: <?php echo"$metodo" ?> </p>
                <p>Resolución: <?php echo"$resolucion" ?> </p>
            </div>
          </div> 
      </div>
      
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
    echo "<li><a href='?pagina=".($pagina-1)."'>Anterior</a></li>";
  }

  for ($i = 1; $i <= $total_paginas; $i++) {
    if ($i == $pagina) {
      echo "<li><a class='pagina-actual'>$i</a></li>";
    } else {
      echo "<li><a href='?pagina=$i'>$i</a></li>";
    }
  }

  if ($pagina < $total_paginas) {
    echo "<li><a href='?pagina=".($pagina+1)."'>Siguiente</a></li>";
  }
  ?>
</div>

<?php


  



mysqli_close($conexion); //cierra la BBDD

?>


<br>


<?php require("footer.php")?>
