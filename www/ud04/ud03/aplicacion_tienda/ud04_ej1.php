<?php
/*
## Ejercicio 1

Cuenta el número de visitas que realiza un usuario a una página web. 
*/
//iniciamos sesion
@session_start();

//en la sesion establecemos el nobre y un contador.
$_SESSION['nombre'] = "Alvaro";
$_SESSION['count'];
//si la sesion no esta iniciada la pone a cero y si lo esta suma uno.
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else {
    $_SESSION['count']++;
}

echo $_SESSION['nombre'] . " ha iniciado sesión " . $_SESSION['count'] . " veces.";


?>

