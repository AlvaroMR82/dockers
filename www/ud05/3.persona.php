
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

    private $id;
    private $nombre;
    protected $apellidos;

    abstract function getId();
    abstract function getNombre();
    abstract function getApellidos();
    abstract function SetId($id);
    abstract function SetNombre($nombre);
    abstract function SetApellidos($apellidos);
    abstract function __construct();
    abstract function accion();
}



    /*
2. Crea dos subclases:
    - `Usuarios`
    - `Administradores`
    */ 

    class Usuarios extends Persona
    {
    
        function getId()
        {
            return $this->id;
        }
        function getNombre()
        {
            return $this->nombre;
        }
        function getApellidos()
        {
            return $this->apellidos;
        }
        function SetId($id)
        {
            parent->$this->id = $id;
        }
        function SetNombre($nombre)
        {
            $this->nombre = $nombre;
        }
        function SetApellidos($apellidos)
        {
            $this->apellidos = $apellidos;
        }
        function __construct($id, $nombre, $apellidos)
        {
            self::SetId($id);
            self::SetNombre($nombre);
            self::SetApellidos($apellidos);
        }
        function accion()
        {
            echo self::getNombre().'<br>';
            echo self::getApellidos().'<br>';
            echo "Esta persona es un ".self::getId();
        }
    }
    
    
    class Administradores extends Persona
    {
    
        function getId()
        {
            return $this->id;
        }
        function getNombre()
        {
            return $this->nombre;
        }
        function getApellidos()
        {
            return $this->apellidos;
        }
        function SetId($id)
        {
            $this->id = $id;
        }
        function SetNombre($nombre)
        {
            $this->nombre = $nombre;
        }
        function SetApellidos($apellidos)
        {
            $this->apellidos = $apellidos;
        }
        function __construct($id, $nombre, $apellidos)
        {
            self::SetId($id);
            self::SetNombre($nombre);
            self::SetApellidos($apellidos);
        }
        function accion() {

            echo self::getNombre().'<br>';
            echo self::getApellidos().'<br>';
            echo "Esta persona es un ".self::getId();
        }
    }    
    
//3. Implementa el método `accion()` que muestre el nombre y los apellidos de la persona, así como una frase identificando si es un usuario o un administrador. 



//4. Genera los objetos que nos permitan identificar un buen funcionamiento de la aplicación. 
