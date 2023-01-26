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

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      Código Postal: <input type="text" name="codigopostal">
      <br><br>
      <input type="submit" name="submit" value="Submit">
      <!-- 6. Completar el formulario -->


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
          //2. Se recojen las variables y se comprueban.
            $cp=null;
            if (isset($_POST['codigopostal'])) {
              $cp = $_POST['codigopostal'];
            }
            
            //se crea una sentencia preparada que busca los datos de los donantes segun el codigo postal
            $stmt = $conn->prepare("SELECT  nombre, apellido, edad, grupo_sanguineo, codigo_postal, movil FROM donantes WHERE codigo_postal='$cp'");
            $stmt->execute();
            //Se recogen los datos y se guardan en una variable para poder acceder a ellos.
            $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            //Se usa un foreach para representar los datos en una tabla html.
            foreach ($stmt->fetchAll() as $k => $v) {


              echo " <tr> ";
              echo "<td>" . $v['nombre'] . "</td> ";
              echo "<td>" . $v['apellido'] . "</td> ";
              echo "<td>" . $v['edad'] . "</td> ";
              echo "<td>" . $v['grupo_sanguineo'] . "</td> ";
              echo "<td>" . $v['codigo_postal'] . "</td> ";
              echo "<td>" . $v['movil'] . "</td> ";
              echo "<td> <a class='btn btn-primary' href=listar_donantes.php?id=" . $v['nombre'] . ">Borrar</a>";
              echo "<a class='btn btn-primary' href=listar_donantes.php?id=" . $v['nombre'] . ">Lista de donanciones</a>";
              echo "<a class='btn btn-primary' href=listar_donantes.php?id=" . $v['nombre'] . ">Registrar donación</a></td>";
              echo "</tr> ";

            }
          
       
          $conn = null;
          ?>
        </tbody>
      </table>
    </form>
  </div>
  <footer><a class="btn btn-primary" href="index.php" role="button"> Volver</a></footer>
</body>

</html>