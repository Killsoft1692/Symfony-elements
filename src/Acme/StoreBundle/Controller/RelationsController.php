<?php

namespace Acme\StoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Tests\EventListener\Fixture\FooControllerCacheAtClassAndMethod;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Category;
use Acme\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class RelationsController extends Controller
{
    /**
     * @return Response
     * @Template()
     */
    public function createProductAction()
    {
        $category = new Category();
        $category->setName('Cool products');

        $product = new Product();
        $product->setName('suggar')
                ->setPrice(52.00)
                ->setDescription('best trademark')
                ->setCategory($category);

        $a1=$product->getName();

        $this->getDoctrine()->getManager()->persist($product);

        $product = new Product();
        $product->setName('jem')
                ->setPrice(20.00)
                ->setDescription('Yami jem')
                ->setCategory($category);

        $a2=$product->getName();

        $this->getDoctrine()->getManager()->persist($product);

        $product = new Product();
        $product->setName('bread with the butter')
                ->setPrice(50.00)
                ->setDescription('It\'s your product')
                ->setCategory($category);

        $a3=$product->getName();

        $this->getDoctrine()->getManager()->persist($product);

        $product = new Product();
        $product->setName('paper')
            ->setPrice(35.00)
            ->setDescription('It\'s your chousen')
            ->setCategory($category);

        $a4=$product->getName();

        $this->getDoctrine()->getManager()->persist($product);

        $this->getDoctrine()->getManager()->persist($category);
        $this->getDoctrine()->getManager()->flush();

         //return new Response(
          //  'Create products'
            //.' in category'.$category->getId()
        //);
        return $this->render('AcmeStoreBundle:Relations:index.html.twig',array('id' => $category->getId()
        ,'prod1' => $a1,'prod2'=>$a2,'prod3'=>$a3, 'prod4'=>$a4));
    }
} 