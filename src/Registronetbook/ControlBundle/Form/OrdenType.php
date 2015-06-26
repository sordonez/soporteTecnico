<?php

namespace Registronetbook\ControlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Registronetbook\ControlBundle\Entity\DetalleMovimiento;

class OrdenType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('finalizado')
            ->add('maquina')
        ;
        //$builder->add('detalleMovimiento', 'collection', array('type' => new DetalleMovimientoType()));
        $builder->add('detalleMovimiento', 'collection', array(
            'type'         => new DetalleMovimientoType(),
            'allow_add'    => true,
            'allow_delete'    => true,
            'by_reference' => false,
        ));
        $builder->add('save','submit',array(
            'attr'  =>array(
                'class' => 'btn btn-lg btn-success'
                ),
        ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Registronetbook\ControlBundle\Entity\Orden'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'registronetbook_controlbundle_orden';
    }
}
