<?php 

include_once('connexiosaraismabbdd.php');

if(!empty($_POST)){
    $alert="";
    if(empty($_POST["nombre"]) || empty($_POST["dni_usuario"]) || empty($_POST["tipo"])){
        $alert="<p class='msg_error'>Todos los campos son obligatorios</p>";
    }else{

        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $dni_usuario = $_POST["dni_usuario"];
        $pass = md5($_POST["password"]);
        $tipo = $_POST["tipo"];

        $query = mysqli_query($conexion,"SELECT * FROM tusuario WHERE DNI = '$dni'

        ");
        $resultado = mysqli_fetch_assoc($query);

        if($resultado > 0){
            $alert="<p class='msg_error'>El usuario ya existe</p>";
        }else{
            if(empty($_POST['password'])){
                $sql_update = mysqli_query($conexion, "UPDATE tusuario
                SET NombreUsuario = '$nombre', Tipo = '$tipo', DNI = '$dni'
                WHERE DNI = '$dni_usuario'");
            }else{
                $sql_update = mysqli_query($conexion, "UPDATE tusuario
                SET NombreUsuario = '$nombre', Tipo = '$tipo', DNI = '$dni', Password = '$pass'
                WHERE DNI = '$dni_usuario'");
            }
            if($sql_update){
                $alert="<p class='msg_correcto'>El usuario ha sido actualizado correctamente</p>";
            }else{
                $alert="<p class='msg_error'>Error al actualizar el usuario</p>";
            }
        }
    }
}

/* Mostrar datos */
if(empty($_GET['DNI'])){
    header("location: listado_usuarios.php");
}
/* aqui revisarrrrrrrrrrrrrrr */
$dni = $_GET['DNI'];
$dni_usuario = $_GET['DNI'];

$sql = mysqli_query($conexion,"SELECT DNI, Tipo, NombreUsuario, Password FROM tusuario WHERE DNI = '$dni'");

$resultado_sql = mysqli_num_rows($sql);

if($resultado_sql == 0){
    header("location: listado_usuarios.php");
}else{
    $option = '';
    while($row = mysqli_fetch_assoc($sql)){

        $nombre = $row['NombreUsuario'];
        $tipo = $row['Tipo'];

        if($tipo == "admin"){
            $option = "<option value='admin' select>admin</option>";
        }else if($tipo == "editor"){
            $option = "<option value='editor' select>editor</option>";
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
    <?php 
    
    include_once("header.php");
    
    if($_SESSION['tipo'] != 'admin'){
        header("location: index.php");
    }
    ?>
    
<br>
<br>
<br>



<div class="container_registrar">


<h1>ACTUALIZAR USUARIO</h1>
<hr>
<div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>

<form action="" method="post">

<input type="hidden" name="dni_usuario" value="<?php echo $dni_usuario; ?>">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre;?> ">

    <label for="dni">DNI</label>
    <input type="text" name="dni" id="dni" placeholder="DNI" minlength="9" maxlength="9" value="<?php echo $dni;?>">

    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" placeholder="Contraseña">


    <label for="tipo">Tipo Usuario</label>

    <select name="tipo" id="tipo" class="noPrimerItem">
        <?php echo "$option";?>
        <option value="admin">admin</option>
        <option value="editor">editor</option>

    </select>

    <input class="btn_guardar" type="submit" value="Actualizar usuario">



</form>

</div>

</body>
</html>