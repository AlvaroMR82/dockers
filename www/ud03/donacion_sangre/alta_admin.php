<?php
//1. Conectar a la base de datos con librerias, ya se comprueba en la funcion coenxion().
include("conexiones.php");
$conn=conexion();

//se crea la tabla administradores a traves de una sentencia.

  $sql1 = "CREATE TABLE IF NOT EXISTS administradores(
      nombre_usuario VARCHAR(50) PRIMARY KEY NOT NULL,
      contrasinal VARCHAR(200) NOT NULL
      )";


//$sql= "DROP TABLE administradores";
    $conn->exec($sql1);


//3. Recoger los datos del formulario 
//4. Validar los datos del formulario evitando posibles ataques y comprobando que estén los datos obligatorios. 

if(isset($_POST['name']) && isset($_POST['password']) ){
$nombre=$_POST['name'];
$contrasinal=$_POST['password'];


//5. Insertar el registro en la base de datos con una sentecia preparada

$stmt = $conn->prepare("INSERT INTO administradores(nombre_usuario, contrasinal) 
VALUES(:nombre, :contrasinal)");

$stmt->bindParam(':nombre',$nombre);
$stmt->bindParam(':contrasinal', $contrasinal);

//6. Comprobar la insercción 
if ($stmt->execute()){
  echo "Insercion correcta";
}
}


//7. Cerrar la conexión 
$conn = null;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <h1>Alta Administradores</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <div class="form-group">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Nombre: <input type="text" name="name">
      <br><br>
      Contraseña: <input type="password" name="password">
      <br><br>
      <input type="submit" name="submit" value="Submit"> 
      
    </form>
    <footer><a class="btn btn-primary" href="index.php" role="button"> Volver</a></footer>
</div>
  </body>
</html>