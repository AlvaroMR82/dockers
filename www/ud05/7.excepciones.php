
<?php 

/*
1. Defina una nueva clase de excepción llamada ```ExPropia```que extienda de ```Excepcion```. No debe hacer nada más. 
*/
class ExPropia extends Exception{};

/*
2. Crea una clase llamada ```ExPropiaClass```, con un método estático ```testNumber``` que recibe un número. Si el número es cero lanza una excepción del tipo ```ExPropia```. La excepción no está atrapada dentro de esta clase. 
*/
class ExPropiaClass{
    public static function testNumber($numero){
        if($numero==0){
            throw new ExPropia("Es un cero");
        }

    }
}

$exc=new ExPropiaClass;

/*
3. Lance el método ```testNumber``` con diferentes valores, capturando las posibles excepciones.
*/

try {
    $exc->testNumber(1);
    $exc->testNumber(5);
    $exc->testNumber(9);
    $exc->testNumber(0);
    
} catch (ExPropia $e) {
   echo $e->getMessage();
}


?>