<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <h1>Lista de usuarios</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <?php
    //1. Crear la conexión 
    $conexion_tienda = new mysqli('db','root','test','tienda');

    //2. Comprobar la conexión
    $error = $conexion_tienda->connect_errno;
    if($error !=null){
      die("Fallo en al conexion".$conexion_tienda->connect_error." Con numero ".$error);
    }
    echo " conexion tienda echa ";

    //3. Configurar una consulta SQL que selecciona las columnas id, nombre, apellido, edad y provincia de la tabla Cliente.
    $sql= "SELECT  nombre FROM usuarios";
    $resultados = $conexion_tienda->query($sql); 
    
    


    ?> 
  <table class="table">
  <thead class="thead-light">
    <tr>
     
      <th scope="col">nombre</th>
      
      <!-- Completar la tabla -->
    </tr>
  </thead>
  <tbody>
  
    <?php 
    //4. Comporbar si se devuelve alguna fila 
   //5. Si se devuelven más de cero filas, recorrer los resultados e imprimir en una tabla los resultados 

      //Ejemplo: echo "<td>". $row['id']. "</td> "; 
      if($resultados->num_rows > 0){

        while($row = $resultados->fetch_assoc()){
          echo "<tr>";
         
          echo "<td>".$row["nombre"]."</td>";
          
          //6. Eliminar la fila correspondiente.   
          //Ejemplo:  echo "<td> <a class='btn btn-primary' href=borrar.php?id=".$row['id'].">Borrar</a> </td>";
          
          echo "</tr>";
        }
      }
  

   

   //7. Cerrar conexión 
   $conexion_tienda->close();
  ?>
    </tbody>
  </table>
  <footer><a class="btn btn-primary" href="index.php" role="button"> Volver</a></footer>
  </body>
</html>