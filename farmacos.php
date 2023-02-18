<?php require("header.php")?>

<?php
include_once('connexiosaraismabbdd.php');

?>

    <div style="margin-top: 100px">
        <h2 style="text-align: center">FÁRMACOS</h2>
    </div>
<br>

<!-- BARRA DE NAVEGACION -->

<form action="buscar_farmacos.php" class="form_container"  method="get" name="formu">

<div class="field" id="searchform">
  <input class="inputs" id="busqueda" name="busqueda" type="text" placeholder="Coloca un fármaco" />
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

  $sql_registro = mysqli_query($conexion, "SELECT COUNT(*) as total_registro FROM tfarmacos");

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

  $sql = mysqli_query($conexion, "SELECT * FROM tfarmacos ORDER BY Nombre ASC LIMIT $desde,$por_pagina
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
  

?>

      <div class='containerColProteinas'> 
          <div class='container_Superior'>
              <div class='nombreProteina'>
                  <p> CodeApp: <?php echo"$codigoApp" ?> | Fecha: <?php echo"$fecha" ?> | Nombre: <?php echo"$nombre" ?> </p>
              </div>

              <?php
                if(!empty($_SESSION['tipo'])){
                    $admin = ($_SESSION['tipo'] == 'admin') ? true : false;
                    if($admin === true){
                      echo '
                      <div class="iconos">
                      <button style="border: 0; background-color: #f0f8ff00" type="submit" name="accion" value="editar"><img class="icon_Editar" src="https://img.icons8.com/pastel-glyph/64/null/edit--v1.png"></button>
                      <a href="eliminar_farmaco.php?id_farmaco='.$id_farmaco.'"><img class="icon_Eliminar" src="https://img.icons8.com/ios-filled/256/delete.png"></a>
                      </div>';
                    }
                  }
                
                ?>


          </div>
          <div class='item'> 
              <img src='img/farmacos/gelocatil.jpg'>
              <div class='container_info'>
                <p>Nombre de fichero: <?php echo"$nombreFichero" ?> </p>
                <p>Tipo de fichero: <?php echo"$tipoFichero" ?> </p>
                <p>Smiles: <?php echo"$smiles" ?> </p>
                <p>InChl: <?php echo"$inChl" ?> </p>
                <p>Estado: <?php echo"$estado" ?> </p>
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
