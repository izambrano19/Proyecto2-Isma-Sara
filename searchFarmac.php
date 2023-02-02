
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
<!DOCTYPE HTML>
<html LANG="es"><head><meta charset="UTF-8"><title>Buscar docente</title>
<link rel="stylesheet" href="css/protein.css">
</head>
<body>

<form action="searchFarmac.php" class="form_container"  method="post" name="formu">
<table border="1">
<tr>
<td>nombre: </td><td><input name="nom" type="text" class="inputs" value="" required/></td>
</tr>
</table>
<input name="enviat" type="hidden" value="1" />
<input name="Enviar" type="submit" value="Buscar" />
<input name="Enviar" type="reset" value="reset" />
</form>
<?php
if ($sele=="0") 
{
  
?>
<?php 
} 
else 
{

$buscado=trim($_POST['nom'], " ");

if (isset($buscado) && strlen($buscado)!=0) 
{	
$sql="SELECT * FROM tfarmacos WHERE Nombre LIKE '".$buscado."%';";

echo "<br>".$sql."<br>";
$resultado = mysqli_query($conexion, $sql);
echo "<br>LLISTAT<br>";


$numderows = mysqli_num_rows($resultado);

if ($numderows > 0) 
{

  echo "<div style='text-align:-webkit-center'>";

  while($row = mysqli_fetch_assoc($resultado)) 
  {
    $idFarmaco = $row["IDFarmaco"];
    //$idCreador = $row["IDcreador"];
    $nombre = $row["Nombre"];
    $codi = $row["CodigoApp"];
    $fecha = $row["Fecha"];
    $estado = $row["Estado"];
    //$fecha = $row["fecha"];
    if($row["CodigoApp"]!=null) {
      
    echo "
            <div id='container'>
              $idFarmaco
              $nombre
              $fecha
              $estado
              <img class='proteinas' src='img/proteinas/proteina-3.jpg'>
            </div>
          
          ";
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
  echo "</div>";
  
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