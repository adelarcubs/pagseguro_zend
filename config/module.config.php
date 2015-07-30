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
            'PagSeguro-PreApprovalRequest' => 'PagSeguro\Factory\PreApprovalRequestFactory',
            'PagSeguro-NotificationRequest' => 'PagSeguro\Factory\NotificationRequestFactory'
        )
    ),
    'router' => array(
        'routes' => array(
            'pag-seguro-notification' => array(
                'type' => 'Literal',
                'priority' => 2000,
                'options' => array(
                    'route' => '/pag-seguro/notification',
                    'defaults' => array(
                        'controller' => 'PagSeguro-Index',
                        'action' => 'notification'
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
