<?php
namespace Registronetbook\ControlBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav nav-tabs');
        $menu->addChild('Estado', array('route' => 'admin_estado'))
        ->setAttribute('icon', 'icon-list');
        $menu->addChild('Maquina', array('route' => 'admin_maquina'))
        ->setAttribute('icon', 'icon-list');
        $menu->addChild('Movimiento', array('route' => 'admin_movimiento'))
        ->setAttribute('icon', 'icon-list');
        $menu->addChild('problema', array('route' => 'admin_problema'))
        ->setAttribute('icon', 'icon-list');
        $menu->addChild('Tipo Movimiento', array('route' => 'admin_tipoMovimiento'))
        ->setAttribute('icon', 'icon-list');
        $menu->addChild('Ubicacion', array('route' => 'admin_ubicacion'))
        ->setAttribute('icon', 'icon-list');
        $menu->addChild('Usuario', array('route' => 'admin_usuario'))
        ->setAttribute('icon', 'icon-list');
        $menu->addChild('Orden', array('route' => 'admin_orden'))
        ->setAttribute('icon', 'icon-list');
        $menu->addChild('Movimientos', array('route' => 'admin_detalleMovimiento'))
        ->setAttribute('icon', 'icon-list');
 //       $menu->addChild('Nuevo', array(
 //           'route' => 'admin_movimiento',
//'Beneficiario'=> 'admin_movimiento'))
//        ->setAttribute('icon', 'icon-group');
//        $menu->addChild('Noticias', array(
//            'route' => 'admin_movimiento',
//            'routeParameters' => array('limit' => 10)
//        ));
//        $menu->addChild('Acerca de...', array('route' => 'admin_maquina'));
        

        return $menu;
    }
}