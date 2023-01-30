<?php
//coenexion a la base de datos y comprobacion
$conexion_tienda = new mysqli('db','root','test','tienda');
$error = $conexion_tienda->connect_errno;
if($error !=null){
  die("Fallo en al conexion".$conexion_tienda->connect_error." Con numero ".$error);
}
echo " conexion tienda echa ";
//se obtiene el id que manda el formulario anterior
$id=$_GET['id'];
//con ese id se prepara una sentencia que borra la entrada correspondiente
$sql= "DELETE FROM usuarios WHERE id='$id'";
//Se comprueba que se ejecuta la sentencia
if($conexion_tienda->query($sql)){
    echo "<h1>entrada borrada</h1>";
}else{
    echo "<h1>fallo eliminando entrada</h1>";
}
//se cierra la conexión
$conexion_tienda->close();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <div class="form-group">

      <footer><a class="btn btn-primary" href="listar_usuarios.php" role="button"> Volver </a></footer>
        <!-- 6. Completar el formulario -->
    
    
</div>
  </body>
</html>