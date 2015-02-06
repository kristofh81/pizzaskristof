<?php

namespace StoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrdersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reduction')
            ->add('totalPrice')
            //->add('date')
            //->add('payed')
            ->add('infoOrder')
            ->add('customerId')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StoreBundle\Entity\Orders'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'storebundle_orders';
    }
}
