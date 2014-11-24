<?php

namespace Acme\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SiteController extends Controller
{

    public function indexAction()
    {
       /**
        * @Route("/site")
        */
       return $this-> render
       ('AcmeTestBundle:Site:index.html.twig');
    }
}