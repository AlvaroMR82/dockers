<?php
//conectamos a la base de datos
$conexion_tienda = new mysqli('db', 'root', 'test', 'tienda');
$error = $conexion_tienda->connect_errno;
//se coamprueba la conexión
if ($error != null) {
  die("Fallo en al conexion" . $conexion_tienda->connect_error . " Con numero " . $error);
}
echo " conexion tienda echa ";

//se cera la sentencia dode se establece la tabla, los datos y su tipo

$sql = "CREATE TABLE IF NOT EXISTS usuarios(
  id INT(6) AUTO_INCREMENT PRIMARY KEY, 
  nombre VARCHAR(50) NOT NULL, 
  pass VARCHAR(100)
)";

//$sql = "DROP TABLE usuarios";
//se comprueba la creación de la tabla
if ($conexion_tienda->query($sql)) {

  echo " tabla creada";
} else {
  echo " error creando tabla o tabla ya existe ";
}

//3. Recoger los datos del formulario
if (isset($_POST['name']) && isset($_POST['pass'])) {
  $nombre = $_POST['name'];
  $contraseña = $_POST['pass'];
  
  //se hashea la contaseña
  $contraseñaHash = password_hash($contraseña, PASSWORD_DEFAULT);
  
  //se verifica que el nobre no estea repetido
  $sql1 = "SELECT id FROM usuarios WHERE nombre ='$nombre'";
  $resultados = $conexion_tienda->query($sql1);
  
  //si no esta en la base de datos se hace la inserción junto con la contaseña encryptada
  if ($resultados->num_rows == 0) {
    $stmt = $conexion_tienda->prepare("INSERT INTO usuarios(nombre, pass) 
    VALUES(?,?)");
      $stmt->bind_param("ss", $nombre, $contraseñaHash);
      if ($stmt->execute()) {
        echo "<br> <h1>Usuario listo. <h1>";
        $stmt->close();
      }
  //si esta repetido te pide que elijas otro nombre  
  } else {
    echo "<br> <h1>Usuario repetido, elije otro nombre por favor.<h1>";
}
}
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

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      Nombre: <input type="text" name="name" required>
      <br><br>
      Contrseña : <input type="password" name="pass" required>
      <br><br>
      <input type="submit" value="Guardar datos">
    </form>
  </div>
  <footer><a class="btn btn-primary" href="login.php" role="button"> Volver </a></footer>
</body>

</html>