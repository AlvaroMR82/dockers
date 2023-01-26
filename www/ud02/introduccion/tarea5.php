<?php

//1. Escribe un programa que pase de grados Fahrenheit a Celsius. Para pasar de Fahrenheit a Celsius se resta 32 a la temperatura, se multiplica por 5 y se divide entre 9.
$celsius=100;
$fahrenheit;
$celsius-=32;
$celsius*=5;
$fahrenheit=$celsius/9;
echo $fahrenheit;


//2. Crea un programa en PHP que declare e inicialice dos variables x e y con los valores 20 y 10 respectivamente y muestre la suma, la resta, la multiplicación, la división y el módulo de ambas variables. 
/*(Optativo) Haz dos versiones de este ejercicios.
    - Guarda los resultados en nuevas variables.
    - Sin utilizar variables intermedias. */

    //version con variable intermedia
    $x=20;
    $y=10;
    $resultado=$x+$y;
    echo $resultado;
    $resultado=$x-$y;
    echo $resultado;
    $resultado=$x*$y;
    echo $resultado;
    $resultado=$x/$y;
    echo $resultado;
    $resultado=$x%$y;
    echo $resultado;

    // version sin variables
    $x=20;
    $y=10;
    echo ($x+$y)." ".($x-$y)." ".($x*$y)." ".($x%$y);




//3. (Optativo) Escribe un programa que imprima por pantalla los cuadrados de los 30 primeros números naturales.

    for ($i=1;$i<30;$i++){
        $cuadrado=pow($i, 2);
        echo $cuadrado." " ;
    }



//4. Hacer un programa php que calcule el área y el perímetro de un rectángulo (```área=base*altura``` y (```perímetro=2*base+2*altura```). Debéis declarar las variables base=20 y altura=10. 
    $base=20;
    $altura=10;
    $area=($base*$altura);
    $perimetro=((2*$base)+ (2*$altura));
    echo $area." ".$perimetro;

?>