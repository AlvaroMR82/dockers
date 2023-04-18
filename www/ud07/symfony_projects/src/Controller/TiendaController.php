<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TiendaController extends AbstractController {

    #[Route('/')]
    public function homepage() {
        return $this->render('tienda/homepage.html.twig', [
            'imagen' => 'symfony_white_03.svg',
        ]);    
    }
    
    #[Route('/tienda')]
    public function tiendaPage() {
        return $this->render('tienda/tiendapage.html.twig', [
            'imagen' => '/symfony_white_03.svg',
        ]);    
    }
    #[Route('/precio/{slug}')]
    public function Preciopage(string $slug=null) {
        if($slug=="prog"){
            return $this->render('tienda/preciopage.html.twig', [
                'precio1' => '5',
                'precio2' => '25',
                'aviso'   =>  '50% de descuento en cursos de programación',
            ]);  
        }
        else{
        return $this->render('tienda/preciopage.html.twig', [
            'precio1' => '10',
            'precio2' => '50',
            'aviso'   =>  ''
        ]);  
    }  
    }
    
}

?>
