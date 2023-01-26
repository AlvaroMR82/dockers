<?php

//1. Conectar a la base de datos

//2. Comprobar la conexión

//3. Recoger el código postal del formulario 

//4. Realizar la consulta a base de datos y recuperar los datos 

//5. Mostrar los datos

//6. Cerrar la conexión 

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
  <h1>Buscar donantes</h1>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <div class="form-group">



    <table class="table">
      <thead class="thead-light">
        <tr>

          <th scope="col">nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">edad</th>
          <th scope="col">Grupo sanguioneo</th>
          <th scope="col">codigo postal</th>
          <th scope="col">movil</th>
          <!-- Completar la tabla -->
        </tr>
      </thead>
      <tbody>
        <?php
//1. Conectar a la base de datos con librerias, ya se comprueba en la funcion coenxion().
        include('conexiones.php');
        $conn = conexion();
             //Se recoge el dato id que envia el aterior formulario y se comprueba   
          if (isset($_GET['id'])) {
            $id = $_GET['id'];
          }
          //Se usa una sentencia preparada para hacer la llamada a la base de datos.
          $stmt = $conn->prepare("SELECT  nombre, apellido, edad, grupo_sanguineo, codigo_postal, movil FROM donantes WHERE id='$id'");
          $stmt->execute();
          //Se recoge el resultado en una variable para acceder a los datos.
          $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          //Se usa un foreach para representar las tabla con los datos del select.
          foreach ($stmt->fetchAll() as $k => $v) {


            echo " <tr> ";
            echo "<td>" . $v['nombre'] . "</td> ";
            echo "<td>" . $v['apellido'] . "</td> ";
            echo "<td>" . $v['edad'] . "</td> ";
            echo "<td>" . $v['grupo_sanguineo'] . "</td> ";
            echo "<td>" . $v['codigo_postal'] . "</td> ";
            echo "<td>" . $v['movil'] . "</td> ";
            echo "</tr> ";
          }
          $stmt = $conn->prepare("SELECT  fecha_donacion, fecha_proxima_donacion FROM historico WHERE id_donante='$id'");
          $stmt->execute();

          $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          echo "<th scope='col'>donacion</th>";
          echo "<th scope='col'>fecha de la proxima donacion</th>";
          foreach ($stmt->fetchAll() as $k => $v) {


            echo " <tr> ";


            echo "<td>" . $v['fecha_donacion'] . "</td> ";
            echo "<td>" . $v['fecha_proxima_donacion'] . "</td> ";
            echo "</tr> ";

            $stmt=null;
          }
         
//6. Cerrar la conexión 


        $conn = null;
        ?>
      </tbody>
    </table>


    <footer><a class="btn btn-primary" href="listar_donantes.php" role="button"> Volver</a></footer>
</body>

</html>