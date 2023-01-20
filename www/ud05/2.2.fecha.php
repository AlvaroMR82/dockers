
<?php 

class Data
{
 private static $calendario = "Calendario gregoriano";
 private static $dias = ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
 private static $meses = [" ","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

 public static function getData()
 {
 $ano = date('Y'); //Nos da el año actual 
 $mes = date('m');
 $dia = date('d');
 return $dia . '/' . $mes . '/' . $ano;
 }
function getCalendar(){

    return self::$calendario;
}
function getHora(){

  return $hora = date('H:i:s');

}
function getDataHora(){
$fecha= self::getData();
$fecha1=explode('/',$fecha);

//return self::getData()."------".$fecha1[0]." ".$fecha1[1]." ".$fecha1[2];
return  "Hoy es ".self::$dias[date('w')]." ". $fecha1[0] ." de ". self::$meses[intval($fecha1[1])]." del ". $fecha1[2]." y son las ".self::getData();  ;

}

}

$fecha = new Data();
echo "Usamos el calendario: ".$fecha->getCalendar()."<br>";
echo $fecha->getDataHora();

/*
- ```getCalendar()```: que devolverá el valor de esta propiedad. 
Devolvera 

- ```getHora()```: que devuelve la hora en el siguiente formato HH:MM:SS. 

- ```getDataHora()```: que llamará a los métodos ```getData()``` y ```getHora()``` para mostrar tanto la fecha como la hora. 
*/ 