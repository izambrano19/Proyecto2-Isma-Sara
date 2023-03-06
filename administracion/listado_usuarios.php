

<?php
include_once('connexiosaraismabbdd.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once("scripts.php")?>
</head>
<body>
    <?php
    include_once("header.php");
    if($_SESSION['tipo'] != 'admin'){
      header("location: index.php");
    }
    
    ?>





<!-- BARRA DE NAVEGACION -->

<div class="container">
  <div class="container_arriba">
    <div style="display: flex">
<h1>LISTADO DE USUARIOS</h1>
<a href="crear_usuario.php" class="btn_nuevo"><i class="fa-solid fa-user-plus"></i>&nbsp CREAR USUARIO</a>
</div>
<form action="buscar_usuarios.php" class="form_busqueda"  method="get" name="formu">

    <div style="display: flex">

    <input id="busqueda" name="busqueda" type="text" placeholder="Buscar" class="input_busqueda"/>
    <input type="submit" value="buscar" class="btn_busqueda"/>
  </div>

</form>

</div>




<?php

  /* PAGINADOR */

  $sql_registro = mysqli_query($conexion, "SELECT COUNT(*) as total_registro FROM tusuario");

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

  $sql = mysqli_query($conexion, "SELECT * FROM tusuario ORDER BY NombreUsuario ASC LIMIT $desde,$por_pagina
  ");
  
  $resultado = mysqli_num_rows($sql);

  if($resultado > 0){

    echo "
    <table>
      <tr>
        <th>DNI</th>
        <th>Nombre de Usuario</th>
        <th>Tipo</th>
        <th>Acciones</th>
      </tr>
    ";
    
    while ($row = mysqli_fetch_assoc($sql)) {
      $dni = $row["DNI"];
      $tipo = $row["Tipo"];
      $nombreUsuario = $row["NombreUsuario"];


      
      echo"
      <tr>
        <td>$dni</td>
        <td>$nombreUsuario</td>
        <td>$tipo</td>
        <td>
          <a class='link_editar' href='editar_usuario.php?DNI=$dni'>EDITAR</a>
          ";

          if($dni != $_SESSION['DNI']){
            echo"
            |
            <a class='link_eliminar' href='eliminar_usuario.php?DNI=$dni'>ELIMINAR</a>  
            </td>
          </tr>
          ";
        }


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

</body>
</html>
