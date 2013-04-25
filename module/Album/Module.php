<?php
namespace Album;

use Album\Model\Album;
use Album\Model\AlbumTable;
use Album\Model\Artist;
use Album\Model\ArtistTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\ModuleManager;

class Module {
    
     public function init(ModuleManager $moduleManager) {
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvents->attach(
            __NAMESPACE__, 
            'dispatch', 
            function($e) {
                $controller = $e->getTarget();
                $controller->layout('layout/layout_config');
            }
            , 100
        );
    }
    public function getAutoloaderConfig() {
       return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getConfig() {
        return include __DIR__.'/config/module.config.php';
    }
    
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Album\Model\AlbumTable' => function($s) {
            $tableGateway = $s->get('AlbumTableGateway');
            $table = new AlbumTable($tableGateway);
            return $table;
                },
                        'AlbumTableGateway' => function($s) {
                    $dbAdapter = $s->get('Zend\Db\Adapter\Adapter');
                    $resultsetPrototype = new Resultset();
                    $resultsetPrototype->setArrayObjectPrototype(new Album());
                    return new TableGateway('album', $dbAdapter, null, $resultsetPrototype);
                        },
                                     'Album\Model\ArtistTable' => function($s) {
            $tableGateway = $s->get('ArtistTableGateway');
            $table = new AlbumTable($tableGateway);
            return $table;
                },
                        'ArtistTableGateway' => function($s) {
                    $dbAdapter = $s->get('Zend\Db\Adapter\Adapter');
                    $resultsetPrototype = new Resultset();
                    $resultsetPrototype->setArrayObjectPrototype(new Album());
                    return new TableGateway('artist', $dbAdapter, null, $resultsetPrototype);
                        },
            ),
        );
    }
}