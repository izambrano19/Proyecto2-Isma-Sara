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


<h1>CREAR PROTEINA</h1>
<hr>
<div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>

<form action="" method="post">

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

    <label for="especie">especie</label>
    <input type="text" name="especie" id="especie">

    <label for="metodo">metodo</label>
    <input type="text" name="metodo" id="metodo">

    <label for="resolucion">resolucion</label>
    <input type="text" name="resolucion" id="resolucion">

    <input type="hidden" id="DNICreador" name="DNICreador" value="<?php echo $_SESSION['DNI']; ?>"/>

    <input class="btn_guardar" type="submit" value="Crear proteína">



</form>

</div>

</body>
</html>