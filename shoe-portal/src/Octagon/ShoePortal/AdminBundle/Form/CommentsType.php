<?php

namespace Octagon\ShoePortal\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text')
            ->add('idSeller', null, array('label'=> 'Seller'))
            ->add('idShoe', null, array('label'=> 'Shoe'))
            ->add('reported', null, array('label'=> 'Reported', 'required' => false))
//            ->add('date', 'hidden')
//            ->add('idOwner', 'hidden')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Octagon\ShoePortal\CustomerBundle\Entity\Comments'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'octagon_shoeportal_customerbundle_comments';
    }
}
