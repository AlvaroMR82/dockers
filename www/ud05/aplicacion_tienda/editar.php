<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <h1>Editar usuarios</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <div class="form-group">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Nombre: <input type="text" name="name">
      <br><br>
      Apellidos: <input type="text" name="apellidos">
      <br><br>
      Edad:  <input type="text" name="edad">
      <br><br>
     <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Provincia:</label>
      <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="provincia">
        <option selected>Elegir: </option>
        <option value="A Coruña">A Coruña</option>
        <option value="Lugo">Lugo</option>
        <option value="Ourense">Ourense</option>
        <option value="Pontevedra">Pontevedra</option>
      </select>
      <input type="hidden" name="id"  value='<?php echo $_GET["id"] ?>'> 
      <input type="submit" name="submit" value="Submit"> 
      <footer><a class="btn btn-primary" href="index.php" role="button"> Volver </a></footer>
        <!-- 6. Completar el formulario -->
    </form>
    
</div>
  </body>
</html>




<?php
//Conexion a la base de datos tienda y se comprueba
$conexion_tienda = new mysqli('db','root','test','tienda');
$error = $conexion_tienda->connect_errno;
if($error !=null){
  die("Fallo en al conexion".$conexion_tienda->connect_error." Con numero ".$error);
}
echo " conexion tienda echa ";
//Obtener los datos del formulario
if(isset($_GET['id']) && isset($_POST['name']) && isset($_POST['apellidos']) && isset($_POST['edad'])&& isset($_POST['provincia']) ){
$id=$_GET['id'];
$nombre = $_POST['name'];
$apellido = $_POST['apellidos'] ;
$edad = $_POST['edad'];
$provincia= $_POST['provincia'];

//Sentencia preparada para hacer el insert en la tabla.

$stmt = "update usuarios set nombre = '$nombre', apellido = '$apellido', edad = '$edad', provincia ='$provincia' where id = '$id' ";

//Se verifica la inserción
if($conexion_tienda->query($stmt)){
    echo "<h1>entrada modificada</h1>";
}else{
    echo "<h1>fallo actualizando entrada</h1>";
}
}
?>
