<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Album\Controller\Album' => 'Album\Controller\AlbumController',
            'Album\Controller\Artist' => 'Album\Controller\ArtistController',
        ),
    ),

    // The following section is new and should be added to your file
    /*'router' => array(
        'routes' => array(
            'album' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/album[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Album\Controller\Album',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),*/
    'router' => array(
    'routes' => array(
        'home' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route'    => '/',
                'defaults' => array(
                    'controller' => 'Application\Controller\Index',
                    'action'     => 'index',
                ),
            ),
        ),
        'application' => array(
            'type'    => 'Literal',
            'options' => array(
                'route'    => '/application',
                'defaults' => array(
                    '__NAMESPACE__' => 'Application\Controller',
                    'controller'    => 'Index',
                    'action'        => 'index',
                ),
            ),
            'may_terminate' => true,
            'child_routes' => array(
                'default' => array(
                    'type'    => 'Segment',
                    'options' => array(
                        'route'    => '/[:controller[/:action]]',
                        'constraints' => array(
                            'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        ),
                        'defaults' => array(
                        ),
                    ),
                ),
            ),
        ),
        'album' => array(
            'type'    => 'Literal',
            'options' => array(
                'route'    => '/album',
                'defaults' => array(
                    '__NAMESPACE__' => 'Album\Controller',
                    'controller'    => 'Album',
                    'action'        => 'index',
                ),
            ),
            'may_terminate' => true,
            'child_routes' => array(
                'default' => array(
                    'type'    => 'Segment',
                    'options' => array(
                        'route'    => '/[:controller[/:action]]',
                        'constraints' => array(
                            'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        ),
                        'defaults' => array(
                            '__NAMESPACE__' => 'Album\Controller',
                            'controller'    => 'Album',
                            'action' => 'index',
                        ),
                    ),
                ),
            ),
        ),
    'artist' => array(
            'type'    => 'Literal',
            'options' => array(
                'route'    => '/artist',
                'defaults' => array(
                    '__NAMESPACE__' => 'Album\Controller',
                    'controller'    => 'Artist',
                    'action'        => 'index',
                ),
            ),
            'may_terminate' => true,
            'child_routes' => array(
                'default' => array(
                    'type'    => 'Segment',
                    'options' => array(
                        'route'    => '/[:controller[/:action]]',
                        'constraints' => array(
                            'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        ),
                        'defaults' => array(
                            '__NAMESPACE__' => 'Album\Controller',
                            'controller'    => 'Artist',
                            'action' => 'index',
                        ),
                    ),
                ),
            ),
        ),

      
    ),
),

    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
        'template_map' => array(
            
            'album/album'           => __DIR__ . '/../view/layout/layout.phtml',
        ),
    ),
);