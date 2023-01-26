<?php
function conexion(){

$servername = "db";
$username = "root";
$password = "test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=donacion", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS donacion ";
    $conn->exec($sql);
    echo "Base de datos creada correctamente<br>";
     return $conn;

  
  
  } catch(PDOException $e) {
    echo  $e->getMessage();
  }
 


echo "prueba de funcion";
}



?> 
