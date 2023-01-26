<?php 

// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
echo "ejercico 1 <br/>";
    function dixito_selec($caracter){
        if (is_numeric($caracter)){
            if($caracter <=10){
                return $caracter;
            }else{
                echo "es mayor de 10 ";
            }
        }else{
            echo "no es un numero";
        } 
    }
    
    $caracter_correcto = dixito_selec("gh");
    echo $caracter_correcto;
    echo "<br/>";


// 2. Crea una función que reciba un string e devolva a súa lonxtude.
echo "ejercico 2 <br/>";
function palabra(string $palabra){
    
return strlen($palabra);
}

$longitud = palabra("hola");
echo "La longitud del estring es ". $longitud;
echo "<br/>";

// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.
echo "ejercico 3 <br/>";
function potencia($a,$b){
    return pow($a,$b);
    
}
$resultado = potencia(3,4);
echo $resultado;
echo "<br/>";
// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.
echo "ejercico 4 <br/>";

function caracter($a){
    
        return preg_match('/[aeiou]/i',$a);
    
}

$vogal = caracter("a");
echo $vogal;
echo "<br/>";

// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
echo "ejercico 5 <br/>";
function parImpar($numero){
    if(($numero%2)==0){
        return "par";
    }
    return "impar";
}


$solucion = parImpar(5);
echo "o numero e: ". $solucion;
echo "<br/>";
// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
echo "ejercico 6 <br/>";

function mayusculas($palabra){
   return strtoupper($palabra);
}

echo $todoMayusculas=mayusculas("hola mundo");
echo "<br/>";

// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
echo "ejercico 7 <br/>";
function zonaHoraria(){
    return ;
}
echo $zona = zonaHoraria();
echo "<br/>";
// 8. Crea una función que imprima a hora á que sae e se pon o sol para a localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude) predeterminadas do teu servidor.
echo "ejercico 8 <br/>";
 
function comprobar_nif($nif){

    $letras= array('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');

    $letra =  strtoupper(substr($nif,-1));
    $numero= intval( substr($nif, 0 ,-1));
    $resto = ($numero%23);
    if ($letras[$resto]==$letra){
        return true;
    }
    return false;
    
}
if (comprobar_nif("12345678W")){
    echo " O nif e correcto";
}else{
    echo " O nif e incorrecto";
}


/*
include()	Inclúe e interpreta o contido do ficheiro.
require()	Igual que include(), coa diferenza de que produce un error fatal no caso de fallo.
include_once()	Igual que include(), coa diferenza de que, se xa se incluiu o ficheiro anteriormente, non se volve a incluir.
require_once()	Igual que require(), coa diferenza de que, se xa se incluiu o ficheiro anteriormente, non se volve a incluir.
*/
?>
