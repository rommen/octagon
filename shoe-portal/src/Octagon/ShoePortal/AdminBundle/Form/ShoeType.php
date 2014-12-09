<?php

namespace Octagon\ShoePortal\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ShoeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('color')
            ->add('size', 'number', array('precision'=>'1'))
            ->add('text')
            ->add('brand')
            ->add('price', 'money', array('label'=>'Price', 'required'=>'false'))
            ->add('sportstar')
            ->add('year')
            ->add('edition')
            ->add('extension')
            ->add('idOwner', null, array('label'=>'Owner'))
            ->add('idCategories', null, array('label'=>'Categories'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Octagon\ShoePortal\CustomerBundle\Entity\Shoe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'octagon_shoeportal_customerbundle_shoe';
    }
}
