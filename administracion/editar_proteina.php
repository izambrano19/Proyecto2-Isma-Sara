<?php 


if(!empty($_POST)){
    $alert="";
    if(empty($_POST["nombre"]) || empty($_POST["codigoApp"]) || empty($_POST["fecha"]) || empty($_POST["nombreFichero"]) || 
    empty($_POST["tipoFichero"]) || empty($_POST["especie"]) || empty($_POST["metodo"]) || empty($_POST["resolucion"])){


        $alert="<p class='msg_error'>Todos los campos son obligatorios</p>";
    }else{
        include_once('connexiosaraismabbdd.php');

        $nombre = $_POST["nombre"];
        $codigoApp = $_POST["codigoApp"];
        $fecha = $_POST["fecha"];
        $nombreFichero = $_POST["nombreFichero"];
        $tipoFichero = $_POST["tipoFichero"];
        $especie = $_POST["especie"];
        $metodo = $_POST["metodo"];
        $resolucion = $_POST["resolucion"];
        $DNICreador = $_POST['DNICreador'];


        $query = mysqli_query($conexion,"SELECT * FROM tproteinas WHERE Nombre = '$nombre'");
        $resultado = mysqli_fetch_assoc($query);

        if($resultado > 0){
            $alert="<p class='msg_error'>La proteína ya existe</p>";
        }else{

            $query_insertar = mysqli_query($conexion, "INSERT INTO tproteinas (Nombre, CodigoApp, Fecha, NombreFichero, TipoFichero, Especie, Metodo, Resolucion, DNICreador)
            VALUES('$nombre','$codigoApp','$fecha','$nombreFichero','$tipoFichero','$especie','$metodo','$resolucion','$DNICreador')");

            if($query_insertar){
                $alert="<p class='msg_correcto'>La proteína ha sido creado correctamente</p>";
            }else{
                $alert="<p class='msg_error'>Error al crear la proteína</p>";
            }
        }
    }
}

//mostrar datos

if(empty($_GET['id_proteina'])){
    header('Location: listado_proteinas.php');
}
include_once('connexiosaraismabbdd.php');
$id_proteina = $_GET['id_proteina'];

$sql = mysqli_query($conexion, "SELECT * FROM tproteinas WHERE IDProteina = '$id_proteina' ");

$result_sql = mysqli_num_rows($sql);

if ($result_sql == 0){
    header('Location: listado_proteinas.php');
}
else{
    
    while($row = mysqli_fetch_assoc($sql)){
        $id_proteina = $row['IDProteina'];
        $nombre = $row['Nombre'];
        $codigoApp = $row['CodigoApp'];
        $fecha = $row['Fecha'];
        $nombreFichero = $row['NombreFichero'];
        $tipoFichero = $row["TipoFichero"];
        $especie = $row["Especie"];
        $metodo = $row["Metodo"];
        $resolucion = $row["Resolucion"];
        $DNICreador = $row['DNICreador'];
    }
}

?>

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



<div class="container_registrar">


<h1>ACTUALIZAR PROTEINA</h1>
<hr>
<div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>

<form action="" method="post">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre;?>">

    <label for="codigoApp">codigoApp</label>
    <input type="text" name="codigoApp" id="codigoApp" placeholder="CodigoApp" minlength="9" maxlength="9" value="<?php echo $codigoApp;?>">

    <label for="fecha">fecha</label>
    <input type="date" name="fecha" id="fecha" value="<?php echo $fecha;?>">

    <label for="nombreFichero">nombreFichero</label>
    <input type="text" name="nombreFichero" id="nombreFichero" value="<?php echo $nombreFichero; ?>">

    <label for="tipoFichero">tipoFichero</label>
    <input type="text" name="tipoFichero" id="tipoFichero" value="<?php echo $tipoFichero ?>">

    <label for="especie">especie</label>
    <input type="text" name="especie" id="especie" value="<?php echo $especie; ?>">

    <label for="metodo">metodo</label>
    <input type="text" name="metodo" id="metodo" value="<?php echo $metodo ?>">

    <label for="resolucion">resolucion</label>
    <input type="text" name="resolucion" id="resolucion" value="<?php echo $resolucion ?>">

    <input type="hidden" id="DNICreador" name="DNICreador" value="<?php echo $_SESSION['DNI']; ?>"/>

    <input class="btn_guardar" type="submit" value="Actualizar proteína">



</form>

</div>

</body>
</html>