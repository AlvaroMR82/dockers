
<?php
//1. Conectar a la base de datos con librerias, ya se comprueba en la funcion coenxion().
include("conexiones.php");
$conn=conexion();

  //se comprueba que se manda el id del donante 
  $id=null;
        if(isset($_GET['id'])){
        $id=$_GET['id'];

        }
//se prepara una sentencia sql para borrar el regitro segun su id
  $stmt =$conn->prepare("DELETE FROM donantes WHERE id='$id'");
  if($stmt->execute()){
//se comprueba  ue el registro se borra corectamente.
    echo "entrada borrada";
  }
  $stmt =$conn->prepare("DELETE FROM historico WHERE id_donante='$id'");
  if($stmt->execute()){
//se comprueba  ue el registro se borra corectamente tambien del registro de donaciones.
    echo " entrada borrada tambien del historial";
  }
$conn=null;

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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <div class="form-group">

      <footer><a class="btn btn-primary" href="listar_donantes.php" role="button"> Volver </a></footer>
         
    
</div>
  </body>
</html>