
<?php 

/*
1. Cree un *Trait* llamado ```CalculosCentroEstudos``` con las mismas funciones que la interfaz del ejercicio 4.5.
*/
trait CalculosCentroEstudos{
   
   
    public function numeroDeAprobados($notas)
    {
        $aprobados = 0;
        for ($i = 0; $i < sizeof($notas); $i++) {
            $nota = $notas[$i];
            if ($nota >= 5) {
                $aprobados++;
            }
        }
        return strval($aprobados);
    }
    public function numeroDeSuspensos($notas)
    {
       
        $suspensos = 0;
        for ($i = 0; $i < sizeof($notas); $i++) {
            $nota = $notas[$i];
            if ($nota < 5) {
                $suspensos++;
            }
           
        }
        return strval($suspensos);
    }
    public function notaMedia($notas)
    {
        $media = 0;

        for ($i = 0; $i < sizeof($notas); $i++) {
            $nota = $notas[$i];
            $media = $media + $nota;
        }

        $media = $media / sizeof($notas);
        return strval($media);
    }
    
    public function toString($notas)
    {
        $listaDeNotas = "";
            foreach ($notas as $nota) {
                $listaDeNotas .= "[$nota]";
            }
            return $listaDeNotas;
    }

}

/*
2. Cree otro *Trait* denominado ```MostrarCalculos``` con dos funciones: 
- la función de saludo que muestra "Bienvenido al centro de cálculo" 
- la función ```showCalculusStudyCenter```, que recibe el número de aprobados, suspensos y la calificación promedio y los muestra en la pantalla dándoles formato.
*/
trait MostrarCalculos{
    public function saludo(){
        return "<h1>Bienvenido al centro de cálculo</h1>";
    }
    public function showCalculusStudyCenter($numAprobados,$numSuspensos,$notaMedia){
     echo "<table border='10' >";   
     echo "<tr>";   
     echo "<th> Aprobados</th> ";
     echo "<th> Suspensos</th> ";
     echo "<th> Nota media </th> ";
     echo "</tr>"; 
     echo "<tr >";   
     echo "<td align='center'>". $numAprobados. "</td> ";
     echo "<td align='center'>". $numSuspensos. "</td> ";
     echo "<td align='center' >". $notaMedia." </td> ";
     echo "</tr>"; 
     echo "</table>";  
    }
    
}

/*
3. Cree una clase llamada ```NotasTrait``` que use los dos *traits* anteriores.
*/
class NotasTrait {
    public static $notas = array(5, 7, 6, 9, 8, 3, 3, 6);
    use CalculosCentroEstudos;
    use MostrarCalculos;
}
/*
Escriba el código correspondiente para "probar" el código anterior.
*/

$nota= new NotasTrait();

echo $nota->saludo();
//echo $nota->toString(NotasTrait::$notas);
$nota->showCalculusStudyCenter($nota->numeroDeAprobados(NotasTrait::$notas),$nota->numeroDeSuspensos(NotasTrait::$notas),$nota->notaMedia(NotasTrait::$notas));
