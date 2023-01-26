<?php

//1. Conectar a la base de datos
include("conexiones.php");
$conn = conexion();

  $sql1 = "CREATE TABLE IF NOT EXISTS historico(
      id INT(6) AUTO_INCREMENT PRIMARY KEY,
      id_donante INT(6),
      fecha_donacion DATE NOT NULL,
      fecha_proxima_donacion DATE NOT NULL 
      )";


  //$sql= "DROP TABLE historico";
  $conn->exec($sql1);
  
// se recoje el id del usuario al que se le va a realizar la donacion y se inserta la fecha de la donación y la del plazo de espera.
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $fecha_actual = new DateTime();//Se coje la fecha actual
  $fecha_donacion = date("y/m/d");
  $fecha_proxima_donacion = new DateTime();//Se crea otra fecha
  $fecha_proxima_donacion->add(new DateInterval('P4M'));//y se le suman 4 meses
  $string_fecha_proxima_donacion = $fecha_proxima_donacion->format("y/m/d");//A esa fecha se la pasa a formato string
}
//Sentencia preparada para insertar los datos en la base de datos.
$stmt = $conn->prepare("INSERT INTO historico(id_donante, fecha_donacion,fecha_proxima_donacion) 
VALUES(:id_donante, :fecha_donacion,:fecha_proxima_doancion)");

$stmt->bindParam(':id_donante', $id);
$stmt->bindParam(':fecha_donacion', $fecha_donacion);
$stmt->bindParam(':fecha_proxima_doancion', $string_fecha_proxima_donacion);

//6. Comprobar la insercción 
if ($stmt->execute()) {
  echo "<h1> donacion realizada correctamente</h1>";
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <table>
    <tr>
      <td>
        <h1>No puede donar hasta <?php echo $string_fecha_proxima_donacion ?></h1>
      </td>
    </tr>
  </table>
  <footer><a class="btn btn-primary" href="listar_donantes.php" role="button"> Volver</a></footer>
</body>
</body>

</html>