
<?php

class Empleado
{
    //PROPIEDADES
    public $nombre;
    public $salario;
    public static $numEmpleados = 0;
    //MÉTODOS
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function __construct($nombre, $salario)
    {
        //creamos una variable estatica que se aumenta caba vez que se usa el constructor
        Empleado::$numEmpleados++;
        $this->nombre = $nombre;
        if ($salario <= 2000) {
            $this->salario = $salario;
        }else{
            $this->salario = 2000;
        }
    }
    public function getSalario()
    {

        return $this->salario;
    }
}
//Crea una clase Operario que sea clase hija de Empleado

class Operario extends Empleado
{
    private $turno;

    public function __construct($nombre, $salario, $turno)
    {
        //ejecuta el constructor de la clase padre.
        parent::__construct($nombre, $salario);

        self::getTurno($turno);
    }
    //el dato de entrada es un boleano que determina si es true el turno es noctruno y si es false diurno
    public function setTurno(bool $turno)
    {

        if ($turno) {
            $this->turno = "nocturno";
        } else {
            $this->turno = "diurno";
        }
    }

    public function getTurno()
    {

        return $this->turno;
    }
}
//Crear objetos que permitan comprobar todos los apartados anteriores

$empleado = new Empleado("Alvaro", 1500);
$operario = new Operario("Alvaro", 1500, false);
echo $empleado::$numEmpleados; //comprobamos que funcione el contador
echo $operario->getTurno(); //comprobamos que funcione la selección de turnos.

$operario2 = new Operario("Alvaro", 2100, true);

echo $operario2->getSalario();//Comprobamos que si ponemos un salario mayor a 2000 eruos no lo  guarda y que funciona el metodo get salario.




/* 
Completa los siguientes apartados: 
1. Cada vez que se cree un empleado se debe aumentar la variable ```$numEmpleados```. 
2. El construtor de la clase empleado asignará un salario de entrada y un nombre, que se pasarán como argumentos. El salario de entrada no podrá superar los 2000 euros.
3. Crea un método getSalario() que devuelva el salario del objecto que lo llame.
4. Crea una clase ```Operario``` que sea clase hija de ```Empleado```. Con las siguientes características: 
    4.1. Tendrá una propiedad privada "turno".  
    4.2. Deberá ejecutar el constructor de la clase padre añadiendo la variable turno.  
    4.3. Crear el setter para turno.  Los valores para esta variable sólo pueden ser "diurno" o "nocturno".  
5. Crear objetos que permitan comprobar todos los apartados anteriores.
*/
