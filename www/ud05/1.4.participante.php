<?php

class Participante {

    private $nombre;
    private $edad;

   function __construct($nombre,$edad){

        $this->nombre=$nombre;
        $this->edad= $edad;

    }
    
    function getNombre(){
        return $this->nombre;

    }
      
    function getEdad(){
        return $this->edad;
        
    }

    function setNombre($nombre){
        $this->nombre=$nombre;
    }

    function setEdad($edad){
        $this->edad=$edad;
    }
}

class Jugador extends Participante{

   private $posicion;

   function __construct($nombre,$edad,$posicion)
   {
    parent::__construct($nombre,$edad);
    $this->posicion=$posicion;
   }

   function getPosicion(){

    return $this->posicion;
   }
   function setPosicion($posicion){
        $this->posicion=$posicion;

   }
}

class Arbitro extends Participante{
    private $añosArbitraje;
    function __construct($nombre,$edad,$añosArbitraje)
    {
     parent::__construct($nombre,$edad);
     $this->añosArbitraje=$añosArbitraje;
    }
    function getAñosArbitraje(){

        return $this->añosArbitraje;
       }
       function setAñosArbitraje($añosArbitraje){
            $this->añosArbitraje=$añosArbitraje;
    
       }

}
$jugador1= new Jugador("juan",22,"central");
$jugador2= new Jugador("pedro", 18,"portero");
$arbitro1= new Arbitro("adujar",35,15);
$arbitro2= new Arbitro("romero",23,5);

echo $jugador1->getNombre()."<br>";
echo $jugador1->getEdad()."<br>";
echo $jugador1->getPosicion()."<br>";

echo $jugador2->getNombre()."<br>";
echo $jugador2->getEdad()."<br>";
echo $jugador2->getPosicion()."<br>";

echo $arbitro1->getNombre()."<br>";
echo $arbitro1->getEdad()."<br>";
echo $arbitro1->getAñosArbitraje()."<br>";

echo $arbitro2->getNombre()."<br>";
echo $arbitro2->getEdad()."<br>";
echo $arbitro2->getAñosArbitraje()."<br>";

$jugador1->setNombre("Juan Manuel")."<br>";
$jugador1->setEdad("24")."<br>";
$jugador1->setPosicion("lateral")."<br>";
$jugador2->setNombre("Pedro David")."<br>";
$jugador2->setEdad(20)."<br>";
$jugador2->setPosicion("delantero")."<br>";
$arbitro1->setNombre("Patricio")."<br>";
$arbitro1->setEdad("37")."<br>";
$arbitro1->setAñosArbitraje(17)."<br>";
$arbitro2->setNombre("Roberto")."<br>";
$arbitro2->setEdad(25)."<br>";
$arbitro2->setAñosArbitraje(7)."<br>";


echo $jugador1->getNombre()."<br>";
echo $jugador1->getEdad()."<br>";
echo $jugador1->getPosicion()."<br>";

echo $jugador2->getNombre()."<br>";
echo $jugador2->getEdad()."<br>";
echo $jugador2->getPosicion()."<br>";

echo $arbitro1->getNombre()."<br>";
echo $arbitro1->getEdad()."<br>";
echo $arbitro1->getAñosArbitraje()."<br>";

echo $arbitro2->getNombre()."<br>";
echo $arbitro2->getEdad()."<br>";
echo $arbitro2->getAñosArbitraje()."<br>";







?>