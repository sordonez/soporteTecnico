<?php

namespace Registronetbook\ControlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MaquinaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('serie')
            ->add('marca')
            ->add('descripcion')
            ->add('usuario' )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Registronetbook\ControlBundle\Entity\Maquina'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'registronetbook_controlbundle_maquina';
    }
}
