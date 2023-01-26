<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Donación Sangre</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <h1>Listar Donantes</h1>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

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
      //1. Conectar a la base de datos
      include("conexiones.php");
      $conn = conexion();

      //3. Recuperar de base de datos los donantes con una sentencia preparada
        $stmt = $conn->prepare("SELECT  id, nombre, apellido, edad, grupo_sanguineo, codigo_postal, movil FROM donantes");
        $stmt->execute();
//4. Imprimir los donantes en forma de tabla e insertar los botones de registrar, eliminar y listar donaciones. 
      /*AYUDA: Usar un bucle e intercalar etiquetas de html en el php. 
      Para los botones pasar el id como argumento. 
      Cuando registremos las donaciones debemos insertar una entrada en el historico. 
      */
        $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($stmt->fetchAll() as $k => $v) {


          echo " <tr> ";
          echo "<td>" . $v['nombre'] . "</td> ";
          echo "<td>" . $v['apellido'] . "</td> ";
          echo "<td>" . $v['edad'] . "</td> ";
          echo "<td>" . $v['grupo_sanguineo'] . "</td> ";
          echo "<td>" . $v['codigo_postal'] . "</td> ";
          echo "<td>" . $v['movil'] . "</td> ";
          echo "<td> <a class='btn btn-primary' href=borrar_donante.php?id=" . $v['id'] . ">Borrar</a>";
          echo "<a class='btn btn-primary' href=listar_doanciones.php?id=" . $v['id'] . ">Lista de donanciones</a>";
          echo "<a class='btn btn-primary' href=registrar_donacion.php?id=" . $v['id'] . ">Registrar donación</a></td>";
          echo "</tr> ";
        }
      //5. Cerrar la conexión 
      $conn = null;
      ?>
    </tbody>
  </table>
  <footer><a class="btn btn-primary" href="index.php" role="button"> Volver</a></footer>
</body>
</body>

</html>