<?php
return array(
    'controllers' => array(
        'factories' => array(
            'PagSeguro-Index' => 'PagSeguro\Factory\PagSeguroControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'PagSeguro-ModuleOptions' => 'PagSeguro\Factory\ModuleOptionsFactory',
            'PagSeguro-PreApprovalRequest' => 'PagSeguro\Factory\PreApprovalRequestFactory'
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
