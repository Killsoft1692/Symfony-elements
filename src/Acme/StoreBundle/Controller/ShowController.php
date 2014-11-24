<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Acme\StoreBundle\Entity\Category;

class ShowController extends Controller
{
    public function indexAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('AcmeStoreBundle:Product')
            ->findByName($id);

        if(!$product){
            throw $this->createNotFoundException(
                'Sorry, db is empty'
            );

        }
       // $this->getDoctrine()->getManager()->remove($product);



        $this->getDoctrine()->getManager()->flush();
    return new Response($product->getCreated());

    }
}