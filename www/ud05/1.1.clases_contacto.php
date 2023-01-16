
<?php 

/*1. Cree una clase ```Contacto```, con las siguientes propiedades privadas: nombre, apellido y número de teléfono. Definir un constructor con 3
argumentos, que asigne los valores a las propiedades. */

class Contacto {
    public $nombre;
    public $apellido;
    public $num_telf;

    function __construct($nombre,$apellido,$num_telf)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;        
        $this->num_telf=$num_telf;
    }
/* 2. Genera los getters y los setters para todas las propiedades y el método ```muestraInformacion()``` que imprima los valores de las propiedades. */

 function getNombre(){
    return $this->nombre;
 }
 function getApellido(){
    return $this->apellido;
 }
 function getNum_telf(){
    return $this->num_telf;
 }



function setNombre($nombre){

    $this->nombre=$nombre;
}

function setApellido($apellido){

    $this->apellido=$apellido;
}

function setNum_telf($num_telf){

    $this->num_telf=$num_telf;
}

function muestraInformacion(){
    echo $this->nombre." ";
    echo $this->apellido." ";
    echo $this->num_telf." ";

}
/* 4. Agregue un método ```__destruct()```, que muestra en pantalla el objeto que se está destruyendo. */ 

function __destruct()
{
    echo "El objeto se esta destruyendo"."<br>";
}

}



/* 3.3. Crea 3 objetos de la clase ```Contacto```, asigne valores a todas sus propiedades y muestre a continuación sus valores, primero con los métodos get() y luego con el método ```muestraInformacion()```. */ 

$contacto1= new Contacto("Alvaro","Mosquera","1234567879");  
$contacto2= new Contacto("Brais","Mosquera","123456789");
$contacto3= new Contacto("Roi","Mosquera","987654321");

echo $contacto1->getnombre()."<br>";
echo $contacto1->getApellido()."<br>";
echo $contacto1->getNum_telf()."<br>"."<br>";

echo $contacto2->getnombre()."<br>";
echo $contacto2->getApellido()."<br>";
echo $contacto2->getNum_telf()."<br>"."<br>";

echo $contacto3->getnombre()."<br>";
echo $contacto3->getApellido()."<br>";
echo $contacto3->getNum_telf()."<br>"."<br>";

echo $contacto1->muestraInformacion()."<br>"."<br>";
echo $contacto2->muestraInformacion()."<br>"."<br>";
echo $contacto3->muestraInformacion()."<br>"."<br>";


/* 4. Agregue un método ```__destruct()```, que muestra en pantalla el objeto que se está destruyendo. */ 



?>