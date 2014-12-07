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
            ->add('size')
            ->add('text')
            ->add('brand')
            ->add('prize')
            ->add('sportstar')
            ->add('year')
            ->add('edition')
            ->add('extension')
            ->add('idOwner')
            ->add('idCategories')
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
