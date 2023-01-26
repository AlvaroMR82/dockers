<?php
session_start();
//iniciamos sesion e incluimos el archivo de funciones donde se inicia la conexion y la base de datos
include('funciones.php');
inicio_tablas();
//Comprobar si se reciben los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   //iniciamos conexion a la base de datos con PDO
   $servername = "db";
   $username = "root";
   $password =  "test";
   try {
      $conPDO = new PDO("mysql:host=$servername; dbname=tienda", $username, $password);
      $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $ex) {
      die("Erro na conexión " . $ex->getMessage());
   }
   //cogemos el nombre de ususario y recuperamos su contraseña con una consulta
   if(isset($_POST['usuario'])){
   $consulta = "SELECT pass FROM usuarios WHERE nombre=:nomeUsuario";
   $stmt = $conPDO->prepare($consulta);
   try {
      $stmt->execute(array('nomeUsuario' => $_POST['usuario']));
   } catch (PDOException $ex) {
      $conPDO = null;
      die("erro recuperando a base de datos " . $ex->getMessage());
   }
   $fila = $stmt->fetch();
//si solo hai un usuario y la contraseña coincide se redirige al la pagina index.php
   if ($stmt->rowCount() == 1) {
      $contrasinalBD = $fila[0];
      $passUsusario = $_POST['pass'];
      if(password_verify($passUsusario, $contrasinalBD)){
         $_SESSION['usuario'] = $_POST['usuario'];
         header("Location: index.php");
      }

   }
   //si no recupera nada o la contraseña no coincide manda el error de fallo en el login
  if ($stmt->rowCount() == 0 || !password_verify($passUsusario, $contrasinalBD)) {
         $stmt = null;
         $conProyecto = null;
         echo " Erro de usuario. ";
      }
   } 
}
$conPDO=null;
$stmt=null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
</head>

<body>

   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <input name="usuario" type="text" placeholder="Escribe tu nombre de usuario">
      <br><br>
      <input name="pass" type="password" placeholder="Contraseña">
      <br><br>
      <!--Lo siguiente envía el formulario-->
      <input type="submit" value="Iniciar sesión">
      <a class="btn btn-primary" href="alta_usuarios.php" role="button">Alta Usuarios</a>
   </form>
</body>

</html>