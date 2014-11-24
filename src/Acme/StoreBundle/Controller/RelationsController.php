<?php

namespace Acme\StoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Tests\EventListener\Fixture\FooControllerCacheAtClassAndMethod;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Category;
use Acme\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class RelationsController extends Controller
{
    public function createProductAction()
    {
        $category = new Category();
        $category->setName('Cool products');

        $product = new Product();
        $product->setName('Some product')
                ->setPrice(52.00)
                ->setDescription('yep')
                ->setCategory($category);

        $this->getDoctrine()->getManager()->persist($product);

        $product = new Product();
        $product->setName('Jem')
                ->setPrice(20.00)
                ->setDescription('Yami jem')
                ->setCategory($category);

        $this->getDoctrine()->getManager()->persist($product);

        $product = new Product();
        $product->setName('Bread with the butter')
                ->setPrice(50.00)
                ->setDescription('It\'s your product')
                ->setCategory($category);

        $this->getDoctrine()->getManager()->persist($product);

        $product = new Product();
        $product->setName('Paper')
            ->setPrice(35.00)
            ->setDescription('It\'s your chousen')
            ->setCategory($category);

        $this->getDoctrine()->getManager()->persist($product);

        $this->getDoctrine()->getManager()->persist($category);
        $this->getDoctrine()->getManager()->flush();

        return new Response(
            'Create products'
            .' in category'.$category->getId()
        );
    }
} 