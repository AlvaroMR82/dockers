
<?php

/*
1. Cree una clase abstracta `Persona`:
    - Con las siguientes propiedades: 
        - `$id` private (`private`).
        - `$nombre` protegida (`protected`).
        - `$apellidos` protegida (`protected`).
    - Tiene como métodos abstractos los getters, los setters y el constructor. 
    - Tiene un método abstracto llamado `accion()`. */

abstract class Persona
{
    //atributos
    private $id;
    protected $nombre;
    protected $apellidos;
    //metodos publicos para poder acceder al $id
    public function  dameId()
    {
        return $this->id;
    }

    public function ponId($id)
    {
        $this->id = $id;
    }

    //Metodos abstractos

    abstract function getId();
    abstract function getNombre();
    abstract function getApellidos();
    abstract function setId();
    abstract function setNombre($nombre);
    abstract function setApellidos($apellidos);
    abstract function __construct($nombre, $apellidos);
    abstract function accion();
}



/*
2. Crea dos subclases:
    - `Usuarios`
    - `Administradores`
    */

class Usuarios extends Persona
{
    //geters
    function getId()
    {
        return parent::dameId();
    }
    function getNombre()
    {
        return $this->nombre;
    }
    function getApellidos()
    {
        return $this->apellidos;
    }

    //seters    
    function setId()
    {
        parent::ponId("Usuario");
    }
    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
    //contructor
    function __construct($nombre, $apellidos)
    {
        self::setId();
        self::setNombre($nombre);
        self::setApellidos($apellidos);
    }

    //3. Implementa el método `accion()` que muestre el nombre y los apellidos de la persona, así como una frase identificando si es un usuario o un administrador. 
    function accion()
    {
        echo self::getNombre() . '<br>';
        echo self::getApellidos() . '<br>';
        echo "Esta persona es un " . self::getId();
    }
}


class Administradores extends Persona
{
    //geters
    function getId()
    {
        return parent::dameId();
    }
    function getNombre()
    {
        return $this->nombre;
    }
    function getApellidos()
    {
        return $this->apellidos;
    }

    //setters
    function setId()
    {
        parent::ponId("Administrador");
    }
    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    //construcor
    function __construct($nombre, $apellidos)
    {
        self::setId();
        self::setNombre($nombre);
        self::setApellidos($apellidos);
    }
    //3. Implementa el método `accion()` que muestre el nombre y los apellidos de la persona, así como una frase identificando si es un usuario o un administrador. 
    function accion()
    {
        echo '<br>' . self::getNombre() . '<br>';
        echo self::getApellidos() . '<br>';
        echo "Esta persona es un " . self::getId() . '<br>';
    }
}
//4. Genera los objetos que nos permitan identificar un buen funcionamiento de la aplicación. 


$Usuario1 = new Usuarios("Alvaro", "Mosquera");//creamos un usuario y ya se prueban los seters
$administrador = new Administradores("Sabela", "Sobrino");//creamos un administrador y ya se prueban los seters


$Usuario1->accion();//con el metodo accion se prueban los geters y el id de la clase padre, tanto de la calse usuarios como la del administradores.
$administrador->accion();

