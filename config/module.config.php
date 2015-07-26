<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'PagSeguro-PagSeguroRequest' => 'PagSeguro\Factory\PagSeguroRequestFactory',
            'PagSeguro-ModuleOptions' => 'PagSeguro\Factory\ModuleOptionsFactory'
        )
    )
);
