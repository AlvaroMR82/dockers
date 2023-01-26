<?php
   //Por ejemplo
   $a = true;// imprime el valor devuelto por is_bool($a)...
   echo is_bool($a); //devuelve que es un booleano con un 1.
   $c = false; // imprime el valor devuelto por gettype($c);
   echo gettype($c); //devuelve que es de tipo boolean.
   $d = ""; // el valor devuelto por empty($d);
   echo empty($d); //devuelve un 1 true a que es una cadena vacia.
   $e = 0.0; // el valor devuelto por empty($e);
   echo empty($e);//devuelve un 1 true a que es una cadena vacia.
   $f = 0; // el valor devuelto por empty($f);
   echo empty($f); // devuelve un uno porque considera que la variable esta vacia.
   $g = false; // el valor devuelto por empty($g);
   echo empty($g); // devuelve un uno porque considera que la variable esta vacia al ser un false=0.
   $h; // el valor devuelto por empty($h);
   echo empty($h);// devuelve un uno porque considera que la variable esta vacia.
   $i = "0"; // el valor devuelto por empty($i);
   echo empty($i);// devuelve un uno porque considera que la variable esta vacia.
   $j = "0.0"; // el valor devuelto por empty($j);
   echo empty($j);// devuelve un uno porque considera que la variable esta vacia.
   $k = true; // el valor devuelto por isset($k);
   echo isset($k);// devuelve un uno porque considera que la variable esta iniciada.
   $l = false; // el valor devuelto por isset($l);
   echo isset($l);// devuelve un uno porque considera que la variable esta iniciada.
   $m = true; // el valor devuelto por is_numeric($m);
   echo is_numeric($m);//devuelve un uno, en teoria es un boolena asique al se 1 lo considera numerico.
   $n = ""; // el valor devuelto por is_numeric($n);
   echo is_numeric($n);//devuelve un 1 pero es una cadena vacia deveria devolver un 0.
   

?>