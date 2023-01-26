<?php
//1. Conectar a la base de datos a traves de una libreria, ya se comprueba en la funcion.
include('conexiones.php');

$conn = conexion();

$sql1 = "CREATE TABLE IF NOT EXISTS donantes(
      id INT(6) AUTO_INCREMENT PRIMARY KEY,
      nombre VARCHAR(30) NOT NULL,
      apellido VARCHAR(30) NOT NULL, 
      edad VARCHAR(50)NOT NULL,
      grupo_sanguineo VARCHAR(2)NOT NULL,
      codigo_postal VARCHAR(5)NOT NULL,
      movil VARCHAR (9)NOT NULL
      )";


//$sql= "DROP TABLE donantes";
$conn->exec($sql1);
//se crea un array para manejar mejor el dato grupo sanguineo.
$grupo_sanguineo = ["", "0-", "0+", "A-", "A+", "B-", "B+", "AB-", "AB+"];

//2. Comprobar la conexión

//3. Recoger los datos del formulario 
//4. Validar los datos del formulario evitando posibles ataques y comprobando que estén los datos obligatorios. 

if (isset($_POST['name'])) {
  $nombre = $_POST['name'];
  $apellidos = $_POST['apellidos'];
  $edad = $_POST['edad'];
  $gs = $_POST['gs'];
  $cp = $_POST['cp'];
  $movil = $_POST['movil'];






  //5. Insertar el registro en la base de datos

  if ($edad >= 18) { //se revisa que sea mayor de 18 años

    $stmt = $conn->prepare("INSERT INTO donantes(nombre, apellido, edad, grupo_sanguineo, codigo_postal, movil  ) 
VALUES(:nombre, :apellido, :edad, :grupo_sanguineo, :codigo_postal, :movil)");

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellidos);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':grupo_sanguineo', $grupo_sanguineo[$gs]);
    $stmt->bindParam(':codigo_postal', $cp);
    $stmt->bindParam(':movil', $movil);
    //6. Comprobar la insercción 

    if ($stmt->execute()) {
      echo "Entrada correcta";
    }
  } else {
    echo "<h1>Vostede non pode ser doante ata ser maior de 18 </h1>";
    echo "<h1>Entrada non realizada<h1>";
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
  <h1>Alta Donantes</h1>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nombre: <input type="text" name="name">
    <br><br>
    Apellidos: <input type="text" name="apellidos">
    <br><br>
    Edad: <input type="text" name="edad">
    <br><br>
    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Grupo sanguíneo:</label>
    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="gs">
      <option selected>Elegir: </option>
      <option value="1">O-</option>
      <option value="2">O+</option>
      <option value="3">A-</option>
      <option value="4">A+</option>
      <option value="5">B-</option>
      <option value="6">B+</option>
      <option value="7">AB-</option>
      <option value="8">AB+</option>
    </select>
    <br><br>
    Código Postal: <input type="text" name="cp">
    <br><br>
    Teléfono móvil: <input type="text" name="movil">
    <br><br>
    <input type="submit" name="submit" value="Submit">
    <!-- 6. Completar el formulario -->
  </form>
  <footer><a class="btn btn-primary" href="index.php" role="button"> Volver</a></footer>
</body>
</body>

</html>