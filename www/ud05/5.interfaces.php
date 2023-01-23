
<?php

/*

1. Declara una **interface** llamada `CalculosCentroEstudios` con los siguientes métodos:
    - ```numeroDeAprobados```, que devuelve el número de aprobados.
    - ```numeroDeSuspensos```, que devuelve el número de suspensos.
    - ```notaMedia```, que devuelve la nota media.

*/
interface CalculosCentroEstudios
{

    public function numeroDeAprobados();
    public function numeroDeSuspensos();
    public function notaMedia();
}

/*

2. Crea una clase ```Notas```:
    - Tendrá un atributo llamado ```notas```. Este atributo será un array con diferentes notas enteras. 
    - Tendrá una función abstracta ```toString()```. Esta función pasará el array a string y lo devolverá. Ejemplo:

    ```php
        public function toString()
        {
            $listaDeNotas = "";
            foreach ($this->get_notas() as $nota) {
                $listaDeNotas .= "[$nota]";
            }
            return $listaDeNotas;
        }
    ```

    */
abstract class Notas
{
    public static $notas = array(5, 7, 6, 9, 8, 3, 3, 6);

    abstract function  toString();
}
/*

3. Crea por último, una clase denominada ```NotasDaw``` que hereda de la clase ```Notas``` e implementa ```CalculosCentroEstudos```.
*/
class NotasDaw extends Notas implements CalculosCentroEstudios
{

    public function numeroDeAprobados()
    {
        $aprobados = 0;
        for ($i = 0; $i < sizeof(Notas::$notas); $i++) {
            $nota = Notas::$notas[$i];
            if ($nota >= 5) {
                $aprobados++;
            }
        }
        return strval($aprobados);
    }
    public function numeroDeSuspensos()
    {
       
        $suspensos = 0;
        for ($i = 0; $i < sizeof(Notas::$notas); $i++) {
            $nota = Notas::$notas[$i];
            if ($nota < 5) {
                $suspensos++;
            }
           
        }
        return strval($suspensos);
    }
    public function notaMedia()
    {
        $media = 0;

        for ($i = 0; $i < sizeof(Notas::$notas); $i++) {
            $nota = Notas::$notas[$i];
            $media = $media + $nota;
        }

        $media = $media / sizeof(Notas::$notas);
        return strval($media);
    }
    public function getNotas(){
        return Notas::$notas;
    }

    public function toString()
    {
        $listaDeNotas = "";
            foreach (self::getNotas() as $nota) {
                $listaDeNotas .= "[$nota]";
            }
            return $listaDeNotas;
    }
}


/*


4. Escribe el código correspondente para "testear" la anterior clase:
    -  Crea un objeto de la clase ```NotasDaw``` e invocar todos los métodos de esta clase mostrando por pantalla los resultados.
    
*/

$notas = new NotasDaw();
echo "Tus Notas son :". $notas->toString().'<br>';
echo "Has aprovado ".$notas->numeroDeAprobados()." asignaturas".'<br>';
echo  "Has suspendido ".$notas->numeroDeSuspensos()." asignaturas".'<br>';
echo "Tu media es ".$notas->notaMedia().'<br>';