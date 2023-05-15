<?php

namespace App\Controller;

use Psr\Cache\CacheItemInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Config\Framework\HttpClientConfig;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TiendaController extends AbstractController {

    //controller de la ruta principal que dirije al home de la pajina
    #[Route('/')]
    public function homepage() {
        return $this->render('tienda/homepage.html.twig', []);    
    }
    //controller quw dirige a la parte de la tienda de la pajina 
   
    #[Route('/tienda')]
    public function tiendaPage(HttpClientInterface $httpClient, CacheInterface $cache) {

        $productos= $cache->get('productos_data',function(CacheItemInterface $cacheItem) use ($httpClient){
            $cacheItem->expiresAfter(0,1);
            $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/AMR20202021/dawcs-json/main/tienda.json');
            $response = $response->toArray();
            return $response;
        } );
/*
     $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/AMR20202021/dawcs-json/main/tienda.json');
     $productos = $response->toArray();
*/
        return $this->render('tienda/tiendapage.html.twig',  ['productos' =>$productos,]);    
    }

//controller que dirige a la parte de los precios
//si se redirige desde los cursos de programación se aplica un 50% de descuento y se cambian los precios
//si es de otros cursos no hace nada, imprime los precios normales.

    #[Route('/precio/{slug}')]
    public function Preciopage(string $slug=null) {
        if($slug=="programacion"){
            return $this->render('tienda/preciopage.html.twig', $cambio = [
                'precio1' => '5',
                'precio2' => '25',
                'aviso'   =>  '50% de descuento en cursos de '.$slug,
            ]);  
            

        }
        else{
        return $this->render('tienda/preciopage.html.twig', $cambio = [
            'precio1' => '10',
            'precio2' => '50',
            'aviso'   =>  ''
        ]);   
        
    }  
   

    }
    #[Route('/guia')]
    public function giapage() {
        return $this->render('tienda/guiapage.html.twig', []);    
    }
    
}

?>
