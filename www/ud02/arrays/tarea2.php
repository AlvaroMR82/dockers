<?php 

/*
Necesitamos almacenar la siguiente información en un array multidimensional:

- **John**
    - email: `john@demo.com`
    - website: `www.john.com`
    - age: `22`
    - password: `pass`
- **Anna**
    - email: `anna@demo.com`
    - website: `www.anna.com`
    - age: `24`
    - password: `pass`
- **Peter**
    - email: `peter@mail.com`
    - website: `www.peter.com`
    - age: `42`
    - password: `pass`
- **Max**
    - email: `max@mail.com`
    - website: `www.max.com`
    - age: `33`
    - password: `pass`

Almacena e imprime la información. 
*/ 
$alumnos = array (
    "john" => array ("email" => "john@demo.com", "website" => "www.john.com", "age" => "22", "password:" => "pass"),
    "Anna" => array ("email" => "anna@demo.com", "website" => "www.anna.com", "age" => "24", "password:" => "pass"),
    "Peter" => array ("email" => "peter@demo.com", "website" => "www.peter.com", "age" => "42", "password:" => "pass"),
    "Max" => array ("email" => "max@demo.com", "website" => "www.max.com", "age" => "33", "password:" => "pass")

);

print_r($alumnos);



?>