<?php
return array(
    'controllers' => array(
        'factories' => array(
            'PagSeguro-Index' => 'PagSeguro\Factory\PagSeguroControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'PagSeguro-PagSeguroRequest' => 'PagSeguro\Factory\PagSeguroRequestFactory',
            'PagSeguro-ModuleOptions' => 'PagSeguro\Factory\ModuleOptionsFactory'
        )
    ),
    'router' => array(
        'routes' => array(
            'pag-seguro' => array(
                'type' => 'Literal',
                'priority' => 2000,
                'options' => array(
                    'route' => '/pag-seguro',
                    'defaults' => array(
                        'controller' => 'PagSeguro-Index',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'pag-seguro' => __DIR__ . '/../view'
        )
    )
);
