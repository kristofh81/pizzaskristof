<?php

namespace StoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use StoreBundle\Entity\Product;
use StoreBundle\Entity\Orders;

class OrderedProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('extra')
            ->add('extraPrice')
            //->add('productId', new ProductType())
            //->add('orderId', new OrdersType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StoreBundle\Entity\OrderedProduct'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'storebundle_orderedproduct';
    }
}
