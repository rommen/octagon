<?php

namespace Octagon\ShoePortal\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsfeedType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tile')
            ->add('text', null, array('attr'=>array('style'=>'height:120px')))
//            ->add('date', null,  array('attr'=>array('style'=>'display:none')))
//            ->add('idOwner', null,  array('attr'=>array('style'=>'display:none')))
            ->add('idCategories', null, array('label'=>'Category'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Octagon\ShoePortal\CustomerBundle\Entity\Newsfeed'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'octagon_shoeportal_customerbundle_newsfeed';
    }
}
