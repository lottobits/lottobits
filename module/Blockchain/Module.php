<?php

namespace Blockchain;

use Manager\Config\ModuleInterface;
use Zend\Mvc\ModuleRouteListener;

class Module implements ModuleInterface
{
    public function onBootstrap($e)
    {
        //$e->getApplication()->getServiceManager()->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
 
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src',
                ),
            ),
        );
    }
    
    public static function getServiceConfig($table = null)
    {
        /*$connect = new Connect();
        return $connect->data(array(
            'path'  => require __DIR__ . '/../../config/autoload/global.php',
            'table' => $table
        ));*/
    }


}
