<?php
include_once('connexiosaraismabbdd.php');

session_start();
//error_reporting(E_ALL ^ E_NOTICE);
if (isset($_POST['enviat'])) $sele=$_POST['enviat'];
else $sele="0";
?>
<!DOCTYPE HTML>
<html LANG="es"><head><meta charset="UTF-8"><title>Buscar docente</title></head>
<body>
<?php
if ($sele=="0") 
{	
?>
<form action="inputProtein.php" method="post" name="formu">
<table border="1">
<tr>
<td>nombre: </td><td><input name="nom" type="text" value="" required/></td>
</tr>
</table>
<input name="enviat" type="hidden" value="1" />
<input name="Enviar" type="submit" value="Buscar" />
<input name="Enviar" type="reset" value="reset" />
</form>
<?php 
} 
else 
{
$buscado=trim($_POST['nom'], " ");

if (isset($buscado) && strlen($buscado)!=0) 
{	
$sql="SELECT * FROM docente WHERE nombre LIKE '".$buscado."';";

echo "<br>".$sql."<br>";
$resultado = mysqli_query($conexion, $sql);
echo "<br>LLISTAT<br>";


$numderows = mysqli_num_rows($resultado);

if ($numderows > 0) 
{
  while($row = mysqli_fetch_assoc($resultado)) 
  {
    if($row["telefono"]!=null) echo "<h4>id: " . $row["iddocente"]. " Nombre: " . $row["nombre"]. " telefono: " . $row["telefono"]."</h4>";
    else                       echo "<h4>id: " . $row["iddocente"]. " Nombre: " . $row["nombre"]."</h4>";
  }
  
} 
else 
{
  echo "<h3>No encontrado</h3>";
}


}
else echo ("No habia datos para buscar");
}
mysqli_close($conexion);
?>
</body>
</html>