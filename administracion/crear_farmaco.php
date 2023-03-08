<?php 


if(!empty($_POST)){
    $alert="";
    if(empty($_POST["nombre"]) || empty($_POST["codigoApp"]) || empty($_POST["fecha"]) || empty($_POST["nombreFichero"]) || 
    empty($_POST["tipoFichero"]) || empty($_POST["smiles"]) || empty($_POST["inChl"]) || empty($_POST["estado"])){

        $alert="<p class='msg_error'>Todos los campos son obligatorios</p>";
    }else{
        include_once('connexiosaraismabbdd.php');

        $nombre = $_POST["nombre"];
        $codigoApp = $_POST["codigoApp"];
        $fecha = $_POST["fecha"];
        $nombreFichero = $_POST["nombreFichero"];
        $tipoFichero = $_POST["tipoFichero"];
        $smiles = $_POST["smiles"];
        $inChl = $_POST["inChl"];
        $estado = $_POST["estado"];
        $DNICreador = $_POST['DNICreador'];


        $query = mysqli_query($conexion,"SELECT * FROM tfarmacos WHERE Nombre = '$nombre'");
        $resultado = mysqli_fetch_assoc($query);

        if($resultado > 0){
            $alert="<p class='msg_error'>El fármaco ya existe</p>";
        }else{

            $query_insertar = mysqli_query($conexion, "INSERT INTO tfarmacos (Nombre, CodigoApp, Fecha, NombreFichero, TipoFichero, Smiles, InChl, Estado, DNICreador)
            VALUES('$nombre','$codigoApp','$fecha','$nombreFichero','$tipoFichero','$smiles','$inChl','$estado','$DNICreador')");

            if($query_insertar){
                $alert="<p class='msg_correcto'>El fármaco ha sido creado correctamente</p>";
            }else{
                $alert="<p class='msg_error'>Error al crear el fármaco</p>";
            }
        }
    }
}


?>



<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once("scripts.php")?>
    <script src="../js/validate_farmacos.js"></script>
    <link rel="stylesheet" href="../css/validate.css">
</head>
<body>
    <?php include_once("header.php")?>
<br>
<br>
<br>


<div class="container_registrar">


<h1>CREAR FÁRMACO</h1>
<hr>
<div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>

<form action="" id="validate" method="post">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" placeholder="Nombre">

    <label for="codigoApp">codigoApp</label>
    <input type="text" name="codigoApp" id="codigoApp" placeholder="CodigoApp" minlength="9" maxlength="9">

    <label for="fecha">fecha</label>
    <input type="date" name="fecha" id="fecha">

    <label for="nombreFichero">nombreFichero</label>
    <input type="text" name="nombreFichero" id="nombreFichero">

    <label for="tipoFichero">tipoFichero</label>
    <input type="text" name="tipoFichero" id="tipoFichero">

    <label for="smiles">smiles</label>
    <input type="text" name="smiles" id="smiles">

    <label for="inChl">inChl</label>
    <input type="text" name="inChl" id="inChl">

    <label for="estado">estado</label>
    <input type="text" name="estado" id="estado">

    <input type="hidden" id="DNICreador" name="DNICreador" value="<?php echo $_SESSION['DNI']; ?>"/>

    <input class="btn_guardar" type="submit" value="Crear fármaco">



</form>

</div>

</body>
</html>