<?php 
include_once('connexiosaraismabbdd.php');

echo "<div class='container'>";

$sql="SELECT * FROM tusuario";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    
    while($row = mysqli_fetch_assoc($resultado)) {
        
        $sql="SELECT IDUsuario, NombreUsuario, Password, Tipo FROM tusuario";
echo "<script>
    
let username = $('#username').val();
    console.log(username);
    </script>";

        $IDUsuario= $row["IDUsuario"];
        $nombreUsuario = $row["NombreUsuario"];
        $password = $row["Password"];
        $tipo = $row["Tipo"];

    }
}
else echo "0 filas";
mysqli_close($conexion); //cierra la BBDD
echo "</div>";


?>
</body>
</html>