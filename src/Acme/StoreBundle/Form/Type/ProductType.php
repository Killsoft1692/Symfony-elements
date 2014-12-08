<?php

namespace Acme\StoreBundle\Form\Type;

use Acme\StoreBundle\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
   // protected $product;

   // public function __construct(Product $product)
   // {
   //     $this->product = $product;
    //}

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
            ->add('name')
            ->add('price')
            ->add('description')
            ->add('category')
            ->add('save', 'submit', array('label' => 'Add Product'))
            ->getForm();
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\StoreBundle\Entity\Product'
        ));
    }


    /**
    +     * Returns the name of this type.
    +     *
    +     * @return string The name of this type
    +     */
    public function getName()
    {
        return 'product';
    }
}