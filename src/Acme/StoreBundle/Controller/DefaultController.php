<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function createAction()
    {
        $product = new Product();
        $product->setName('Bread');
        $product->setPrice('1');
        $product->setDescription('GoodFood');
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        //  return new Response('Created product '.$product->getName());
        return $this->render('AcmeStoreBundle:Default:index.html.twig',array("create"=>$product->getCreated()));
    }
}
