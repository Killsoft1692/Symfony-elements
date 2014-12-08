<?php

namespace Acme\StoreBundle\Controller;

use Acme\StoreBundle\Entity\Product;
use Acme\StoreBundle\Form\Type\ProductType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class ProductController extends Controller
{
    /**
     * @Method(methods={"GET", "POST"})
     * @param Request $request
     * @internal param $product
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addAction(Request $request)
    {
        $product = new Product();

        $form = $this->createForm(new ProductType(),$product);
        $form->handleRequest($request);

        if($form->isValid()){

            $this->getDoctrine()->getManager()->persist($product);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect($this->generateUrl('product_pushed'));
        }

        return $this->render('AcmeStoreBundle:Product:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('AcmeStoreBundle:Product')->findAll();

        return $this->render('AcmeStoreBundle:Product:index.html.twig',array('products'=>$products));
    }
}