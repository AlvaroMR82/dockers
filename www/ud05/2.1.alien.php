
<?php
//1. Crea una clase ```Alien``` con un atributo llamado nombre y un constructor.
class Alien
{

    private $nombre;

//2. Agregue un atributo ```numberOfAliens``` para que podamos saber la cantidad de objetos de esta clase que se han creado.
    public static $numberOfAliens;

    public function __construct($nombre){
        $this->nombre=$nombre;    
        Alien::$numberOfAliens++;    
    }

//3. Cree un método ```getNumberOfAliens``` que devuelva esa información.

    public  static function getNumberOfAliens(){

        return Alien::$numberOfAliens;
    }

}

//Escribe el código que crea varios objetos de Alien y muestra el valor devuelto por el método ```numberOfAliens```.

$alien1=new Alien("et");
$alien2=new Alien("alf");
$alien3=new Alien("spock");
$alien4=new Alien("superman");
 echo Alien::getNumberOfAliens();

?>