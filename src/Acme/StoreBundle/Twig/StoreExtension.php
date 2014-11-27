<?php

namespace Acme\StoreBundle\Twig;

class StoreExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('add', array($this, 'addFilter'))
        );
    }

    public function addFilter($add)
    {
        //$add= word_format($word);
        $add='hot price: '.$add;

        //return $add;
        return "<span style='color:#ff3c00'>". $add. "</span>";
    }

    public function getName()
    {
        return 'store_extension';
    }
}