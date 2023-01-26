
<?php 

/**  Cree un formulario que solicite su nombre y apellido. Cuando se reciben los datos, se debe mostrar la siguiente información:
 * Nombre: `xxxxxxxxx`
 *  Apellidos: `xxxxxxxxx`
 * Nombre y apellidos: `xxxxxxxxxxxx xxxxxxxxxxxx`
 * Su nombre tiene caracteres `X`.
 * Los 3 primeros caracteres de tu nombre son: `xxx`
 * La letra A fue encontrada en sus apellidos en la posición: `X`
 * Tu nombre en mayúsculas es: `XXXXXXXXX`
 * Sus apellidos en minúsculas son: `xxxxxx`
 * Su nombre y apellido en mayúsculas: `XXXXXX XXXXXXXXXX`
 * Tu nombre escrito al revés es: `xxxxxx`
*/

$nombre = $_POST['name'];
$apellido = $_POST['apellido'];

echo "Nombre: ".$nombre."<br/>";
echo "Apellidos: ".$apellido."<br/>";
echo "Nombre y Apellidos: ".$nombre. " ".$apellido."<br/>";
echo "Tu nopmbre tiene ".strlen($nombre)." caracteres <br/>";
echo "los tres primeros caracteres de su nombre son: ".substr($nombre,0,3)."<br/>";
echo "La letra A fue encontrada en sus apellidos en la posición: ".strpos($apellido,'a')."<br/>";
echo "Tu nombre en mayúsculas es: ". strtoupper($nombre)."<br/>";
echo "Sus apellidos en minúsculas son: ".strtolower($apellido)."<br/>";
echo "Su nombre y apellido en mayúsculas: " .strtoupper($nombre)." ".strtoupper($apellido)."<br/>";
echo "Tu nombre escrito al revés es: ".strrev($nombre)."<br/>";

?>




