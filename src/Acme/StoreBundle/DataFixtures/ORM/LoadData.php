<?php

namespace Acme\StoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\StoreBundle\Entity\Product;
use Acme\StoreBundle\Entity\Category;

class LoadData implements FixtureInterface
{
    /**
     * {inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $product=new Product();
        $product
            ->setName('The Bread with the butter')
            ->setPrice(100)
            ->setDescription('Its exactly what you need');

        $category=new Category();
        $category->setName('Music');

        $manager->persist($category);
        $manager->persist($product);

        $manager->flush();
    }
}