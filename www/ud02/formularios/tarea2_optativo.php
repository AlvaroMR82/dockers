

<?php 


/*
Crea un formulario para solicitar una de las siguientes bebidas:

    Bebida|PVP
    :-|:-:
    Coca Cola|1 €
    Pepsi Cola|0,80 €
    Fanta Naranja|0,90 €
    Trina Manzana|1,10 €
    
    A mayores, necesitamos un campo adicional con la cantidad de bebidas a comprar y un botón de <kbd>Solicitar</kbd>.
    
    La aplicación mostrará algo como:

    Pediste 3 botellas de Coca Cola. Precio total a pagar: 3 Euros.
    Puedes utilizar sentencias `switch` o `if`.
    */
$bebida = $_POST['opcion'];
$numero = $_POST['numero'];
function total($cantidad,$bebida_pedida){
        if ( $bebida_pedida == "pepsi"){

            return ($cantidad * 0.8);

        }elseif($bebida_pedida =="fanta"){
            
            return ($cantidad * 0.9);


        }elseif($bebida_pedida == "trina"){

            return ($cantidad * 1.10);

        }elseif ($bebida_pedida == "cocacola"){
            return $cantidad;
        }
        
}
echo "Pediste $numero botellas de $bebida. El precio total a paga es:".total($numero,$bebida)."€" ;


?>