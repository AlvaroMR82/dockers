
<?php

/*

Utilizando una **clase anónima** crea diferentes objetos con los siguientes requisitos:
- La clase tiene **dos propiedades**:
    - `$base`
    - `$altura`
- La clase tiene **dos métodos**:
    - `area()`: devolve la (base * altura) / 2 .

Escribe un ejemplo de uso.
*/
$obj = new class
{
    private   $base=5;
    private   $altura=5;
    
    public function area(){

        return ($this->base*$this->altura)/2;
    }    
    

};

echo  strval($obj->area());

//las clases anonimas solo se pueden usar una vez.

?>