
<?php
//hacemos una conexion inicial a la base de datos, orientado a objetos. 
$conexion_inicial = new mysqli('db','root','test','dbname');
$error = $conexion_inicial->connect_errno;
if($error !=null){
  die("Fallo en al conexion".$conexion_inicial->connect_error." Con numero ".$error);
}
echo " conexion inicial echa ";
//Se crea la sentencia para crear la base de datos tienda con la que trabajaremos a partir de ahora.
$sql= "CREATE DATABASE IF NOT EXISTS tienda";
if ($conexion_inicial->query($sql)){

  echo " base de datos creada ";
}else{
  echo " error creando base de datos ";
}




//1. Conectar a la base de datos, se conecata ya a la base de datos de la tienda 
$conexion_inicial->close();
$conexion_tienda = new mysqli('db','root','test','tienda');
$error = $conexion_tienda->connect_errno;
//se coamprueba la conexión
if($error !=null){
  die("Fallo en al conexion".$conexion_tienda->connect_error." Con numero ".$error);
}
echo " conexion tienda echa ";

//se cra la sentencia dode se establece la tabla, los datos y su tipo
$sql = "CREATE TABLE IF NOT EXISTS usuarios(
  id INT(6) AUTO_INCREMENT PRIMARY KEY, 
  nombre VARCHAR(50) NOT NULL, 
  apellido VARCHAR(100) NOT NULL,
  edad INT(50) NOT NULL,
  provincia VARCHAR(50) NOT NULL
)";

//$sql = "DROP TABLE ususarios";
//se comprueba la creación de la tabla
if ($conexion_tienda->query($sql)){

echo " tabla creada";
}else{
echo " error creando tabla o tabla ya existe ";
}

//3. Recoger los datos del formulario
if(isset($_POST['name']) && isset($_POST['apellidos']) && isset($_POST['edad']) && isset($_POST['provincia']) ){
$nombre = $_POST['name'];
$apellido = $_POST['apellidos'] ;
$edad = $_POST['edad'];
$provincia= $_POST['provincia'];
}
//sentencia preparada para hacer el insert en la tabla
$stmt = $conexion_tienda->prepare("INSERT INTO usuarios(nombre, apellido, edad, provincia) 
VALUES(?,?,?,?)");
$stmt->bind_param("ssss", $nombre, $apellido, $edad, $provincia);

//6. Comprobar la insercción 

if($stmt->execute()){
  echo "entrada hecha";
}

$stmt->close();






//7. Cerrar la conexión 


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
    <h1>Alta usuarios</h1>
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
      <input type="submit" name="submit" value="Submit"> 
        <!-- 6. Completar el formulario -->
    </form>
</div>
<footer><a class="btn btn-primary" href="index.php" role="button"> Volver </a></footer>
  </body>

</html>



