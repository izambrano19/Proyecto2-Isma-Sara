<?php require("header.php")?>

<?php
include_once('connexiosaraismabbdd.php');
//error_reporting(E_ALL ^ E_NOTICE);
if (isset($_POST['enviat'])) $sele=$_POST['enviat'];
else $sele="0";
?>

    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <div>
        <h2 style="text-align: center">PROTEINS</h2>
    </div>
<br>

<!-- BARRA DE NAVEGACION -->


<div class="field" id="searchform">
  <input type="text" id="searchterm" placeholder="Proteina?" />
  <button type="button" id="search"><img class="iconSearch" src="https://img.icons8.com/material-outlined/256/search.png"></button>
</div>

<!--<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>-->


<div class="containerBotonItems">
        <input class="botonItems" type="button" value="NEW ITEM">
        <input class="botonItems" type="button" value="MY ITEM">
    </div>

    <?php

// Número de registros por página
$registros_por_pagina = 10;

// Número de página actual (se obtiene a través de la URL o del formulario)
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el número de registro desde el cual debe comenzar a recuperar registros
$inicio = ($pagina_actual - 1) * $registros_por_pagina;


if ($sele=="0"){
    $sqlProteinas="SELECT * FROM tproteinas LIMIT $inicio, $registros_por_pagina";
$resultado = mysqli_query($conexion, $sqlProteinas);

if (mysqli_num_rows($resultado) > 0) {

    ?>
    <div class="containerProteinas">

    <?php
        while($row = mysqli_fetch_assoc($resultado)) {

        $nombre = $row["Nombre"];
        $codigoApp = $row["CodigoApp"];
        $fecha = $row["Fecha"];
        $nombreFichero = $row["NombreFichero"];
        $tipoFichero = $row["TipoFichero"];
        $especie = $row["Especie"];
        $metodo = $row["Metodo"];
        $resolucion = $row["Resolucion"];

        
        echo "

        <div class='containerColProteinas'> 
            <div class='container_Superior'>
                <div class='nombreProteina'>
                    <p> CodeApp: $codigoApp | Fecha: $fecha | Nombre: $nombre</p>
                </div>
                <div class='iconos'>
                <img class='icon_Editar' src='https://img.icons8.com/pastel-glyph/64/null/edit--v1.png'/>
                    <img class='icon_Eliminar' src='https://img.icons8.com/ios-filled/256/delete.png'/>
                </div>
            </div>
            <div class='item'> 
                <img src='img/proteinas/proteina-1.png'>
                <div class='container_info'>
                <p>Nombre de fichero: $nombreFichero</p>
                <p>Tipo de fichero: $tipoFichero</p>
                <p>Especie: $especie</p>
                <p>Método: $metodo</p>
                <p>Resolución: $resolucion</p>

                </div>
            </div> 
        </div>
        
        ";
}
?>
</div>

<?php

echo "<h3>numero de filas-> ". mysqli_num_rows($resultado) ."</h3>";
}
else{
    echo "<h3>No tenemos datos para mostrar en la tabla</h3>";
    echo "<h3><a href='practica2IsmaelZambrano.html'>INDEX</a></h3>";	
}
}
else{
    /* SARA */
}


// Mostrar los enlaces de paginación
$sql_total = "SELECT COUNT(*) as total FROM tproteinas";
$result_total = mysqli_query($conexion, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_registros = $row_total["total"];

// Calcular el número total de páginas
$total_paginas = ceil($total_registros / $registros_por_pagina);


mysqli_close($conexion); //cierra la BBDD

?>

<div class="pagination">
  <?php
  if ($pagina_actual > 1) {
    echo "<li><a href='proteins.php?pagina=".($pagina_actual-1)."'>Anterior</a></li>";
  }

  for ($i = 1; $i <= $total_paginas; $i++) {
    if ($i == $pagina_actual) {
      echo "<li><a class='current-page'>$i</a></li>";
    } else {
      echo "<li><a href='proteins.php?pagina=$i'>$i</a></li>";
    }
  }

  if ($pagina_actual < $total_paginas) {
    echo "<li><a href='proteins.php?pagina=".($pagina_actual+1)."'>Siguiente</a></li>";
  }
  ?>
</div>




<br>


<?php require("footer.php")?>
