<?php 

//1. Almacena en un array los 10 primeros números pares. Imprímelos cada uno en una línea.


$datos =[2,4,6,8,10,12,14,16,18,20 ];
print_r($datos); // inpreso con print_r
foreach($datos as $p){ //impreso con foreach
    echo $p, "<br/>";
} ;


/* 2. Imprime los valores del array asociativo siguiente usando un foreach:
*/ 
$v[1]=90;
$v[10] = 200;
$v['hola']=43;
$v[9]='e';

foreach($v as $p){
    echo $p, "<br/>";
};



?>