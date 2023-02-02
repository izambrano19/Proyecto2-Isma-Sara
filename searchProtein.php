
<?php require("header.php");

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

include_once('connexiosaraismabbdd.php');

//error_reporting(E_ALL ^ E_NOTICE);
if (isset($_POST['enviat'])) $sele=$_POST['enviat'];
else $sele="0";
?>

<form action="searchProtein.php" class="form_container"  method="post" name="formu">

<div class="field" id="searchform">
  <input id="searchterm" placeholder="Proteina?" name="nom" type="text" class="inputs" value="" required />
  <button name="enviat" type="hidden" value="1" id="search"><img class="iconSearch" src="https://img.icons8.com/material-outlined/256/search.png"></button>
</div>
</from>
<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

<?php
if ($sele=="0") 
{
  echo 
  '

<div class="containerProteinas">
  <div class="containerBotonItems">
    <input class="botonItems" type="button" value="NEW ITEM">
    <input class="botonItems" type="button" value="MY ITEM">
  </div>

  <div class="containerColProteinas"> 
		<div class="item"> 
      <img class="icon_Eliminar" src="https://img.icons8.com/ios-filled/256/delete.png"/>
      <img class="icon_Editar" src="https://img.icons8.com/pastel-glyph/64/null/edit--v1.png"/>
      <img src="img/proteinas/proteina-1.png">
		</div> 
		<div class="item"> 
      <img class="icon_Eliminar" src="https://img.icons8.com/ios-filled/256/delete.png"/>
      <img class="icon_Editar" src="https://img.icons8.com/pastel-glyph/64/null/edit--v1.png"/>    
      <img src="img/proteinas/proteina-2.jpg">
		</div> 
      <div class="item"> 
        <img class="icon_Eliminar" src="https://img.icons8.com/ios-filled/256/delete.png"/>
        <img class="icon_Editar" src="https://img.icons8.com/pastel-glyph/64/null/edit--v1.png"/>
        <img src="img/proteinas/proteina-3.jpg">
	    </div> 
      <div class="item"> 
          <img class="icon_Eliminar" src="https://img.icons8.com/ios-filled/256/delete.png"/>
          <img class="icon_Editar" src="https://img.icons8.com/pastel-glyph/64/null/edit--v1.png"/>
          <img src="img/proteinas/proteina-1.png">
		  </div> 
      <div class="item"> 
        <img class="icon_Eliminar" src="https://img.icons8.com/ios-filled/256/delete.png"/>
        <img class="icon_Editar" src="https://img.icons8.com/pastel-glyph/64/null/edit--v1.png"/>
        <img src="img/proteinas/proteina-2.jpg">
		  </div> 
		  <div class="item"> 
        <img class="icon_Eliminar" src="https://img.icons8.com/ios-filled/256/delete.png"/>
        <img class="icon_Editar" src="https://img.icons8.com/pastel-glyph/64/null/edit--v1.png"/>
        <img src="img/proteinas/proteina-3.jpg">
		  </div> 
	</div> 

</div>  
  '
?>
<?php 
} 
else 
{
$buscado=trim($_POST['nom'], " ");

if (isset($buscado) && strlen($buscado)!=0) 
{

$sql="SELECT * FROM tproteinas WHERE Nombre LIKE '".$buscado."%';";

//echo "<br>".$sql."<br>";
$resultado = mysqli_query($conexion, $sql);
//echo "<br>LLISTAT<br>";

echo
  '
  <div class="containerProteinas">
    <div class="containerBotonItems">
      <input class="botonItems" type="button" value="NEW ITEM">
      <input class="botonItems" type="button" value="MY ITEM">
    </div>
    <div class="containerColProteinas">

  ';

$numderows = mysqli_num_rows($resultado);

if ($numderows > 0) 
{

  //echo "<div style='text-align:-webkit-center'>";

  while($row = mysqli_fetch_assoc($resultado)) 
  {
    $idProteina = $row["IDProteina"];
    //$idCreador = $row["IDcreador"];
    $nombre = $row["Nombre"];
    $codi = $row["CodigoApp"];
    //$fecha = $row["fecha"];
    if($row["CodigoApp"]!=null) {
    
    echo 
    '
      <div class="item"> 
        <img class="icon_Eliminar" src="https://img.icons8.com/ios-filled/256/delete.png"/>
        <img class="icon_Editar" src="https://img.icons8.com/pastel-glyph/64/null/edit--v1.png"/>
        <img src="img/proteinas/proteina-1.png">
        '.$nombre.'
      
      </div>
          
    ';
    } 
    else
    {
      echo "
      
        <div id='container'>
          $idProteina
          $nombre
          <img class='proteinas' src='img/proteinas/proteina-3.jpg'>
        </div>
      
      ";
    }
   
  }
  echo "
      
    </div>
  </div>";
  
} 
else 
{
  echo "<h3 style='text-align:-webkit-center'>No encontrado</h3>";
}


}
else echo ("No habia datos para buscar");
}
mysqli_close($conexion);
?>
</body>
</html>