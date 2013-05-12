<?php
/**
 * The config information is passed to the relevant components by the 
 * ServiceManager. The controllers section provides a list of all the 
 * controllers provided by the module. 
 * 
 * Within the view_manager section, we add our view directory to the 
 * TemplatePathStack configuration. 
 * 
 * @return array 
 */
namespace MyService;

return array(
    
    'controllers' => array(
        'factories' => array(
            'MyService\Controller\MyService' => 
                    'MyService\Services\MyServiceControllerFactory',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            
            'myservice' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/myservice[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'MyService\Controller\MyService',
                        'action'     => 'index',
                    ),
                ),
            ),
            
        ),
    ),
    
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
                
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
    'service_manager' => array(
        'factories' => array(
            'business_service'    => 'MyService\Services\ServiceFactory',
        ),
    ),

    
);
