<?php
//iniciamos sesion e importamos las funciones
session_start();
include("funciones.php");
//establecemos la conexión con la base de datos 
$conexion_tienda = new mysqli('db', 'root', 'test', 'tienda');
$error = $conexion_tienda->connect_errno;
//se coamprueba la conexión
if ($error != null) {
  die("Fallo en al conexion" . $conexion_tienda->connect_error . " Con numero " . $error);
}
echo " conexion tienda echa ";

//se crea la sentencia dode se establece la tabla, los datos y su tipo
$sql = "CREATE TABLE IF NOT EXISTS productos(
  id INT(6) AUTO_INCREMENT PRIMARY KEY, 
  nombre VARCHAR(50) NOT NULL, 
  descripcion VARCHAR(100) NOT NULL,
  precio FLOAT NOT NULL,
  unidades FLOAT NOT NULL,
  foto BLOB NOT NULL
)";

//$sql = "DROP TABLE ususarios";
//se comprueba la creación de la tabla
if ($conexion_tienda->query($sql)) {

  echo " tabla creada";
} else {
  echo " error creando tabla o tabla ya existe ";
}

//3. Recoger los datos del formulario
if (isset($_POST['name']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['unidades']) && isset($_FILES['foto'])) {
  $nombre = $_POST['name'];
  $descripcion = $_POST['descripcion'];
  $precio = $_POST['precio'];
  $unidades = $_POST['unidades'];
  $foto = $_FILES['foto'];
  $fotoTamaño = $_FILES["foto"]["tmp_name"];
  $target_dir = "./uploads/";
  $target_file = $target_dir . basename($_FILES['foto']['name']);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

/*subimos el archivo al servidor con los condicionales de que no exista ya el fichero, 
la extensión sea la correcta y el tamaño no supere lo establecido*/ 
  if (!file_exists($target_file)) {
    if (compruebaExtension($imageFileType)) {//si quisieramos subir cualquier tipo de archivo quitariamos este condicional
      if (comprobaTamanho()) {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
          echo " archivo subido";
        } else {
          echo " archivo no subido";
        }
      } else {
        echo " archivo muy grande";
      }
    } else {
      echo "Formato incorrecto ";
    }
  }

//una vez subido el archivo al servidor lo recuperamos para introducirlo a la base de datos 
//(auque prece ser no es una buena practica, lo mejor seria recoger la ruta del archivo y obtenerlo del servidor)
if (file_exists('./uploads/' . $_FILES['foto']['name'])) {
  $imagen2 = file_get_contents('./uploads/' . $_FILES['foto']['name']);
  //sentencia preparada para hacer el insert en la tabla
  $stmt = $conexion_tienda->prepare("INSERT INTO productos (nombre, descripcion, precio, unidades, foto) 
VALUES(?,?,?,?,?)");
  $stmt->bind_param("ssdds", $nombre, $descripcion, $precio, $unidades, $imagen2);

  //6. Comprobar la insercción 

  if ($stmt->execute()) {
    echo " entrada hecha";
    
  }
  $stmt->close();

} else {
  echo "fallo en la subida del archivo";
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
  <h1>Alta productos</h1>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <div class="form-group">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
      Nombre producto: <input type="text" name="name" id="name" required>
      <br><br>
      Descripción: <input type="text" name="descripcion" id="descripcion" required>
      <br><br>
      Precio: <input type="number" name="precio" id="precio" required>
      <br><br>
      Unidades: <input type="number" name="unidades" id="unidades" required>
      <br><br>
      Foto: <input type="file" name="foto" id="foto" required>
      <br><br>


      <input type="submit" name="submit" value="Submit">
      <!-- 6. Completar el formulario -->
    </form>
  </div>
  <footer><a class="btn btn-primary" href="index.php" role="button"> Volver </a></footer>
</body>

</html>