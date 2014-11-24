<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    protected $created;
   
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
   /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="Category")
     */
    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    public function setName($name)
    {
        $this->name = $name;

        return $name;
    }


    /**
     * Add products
     *
     * @param \Acme\StoreBundle\Entity\Product $products
     * @return Category
     */
    public function addProduct(\Acme\StoreBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Acme\StoreBundle\Entity\Product $products
     */
    public function removeProduct(\Acme\StoreBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
         return $this->products;
    }

    /**
     * ORM\prePersist
     */
    public function setCreatedValue()
    {

    }
}
