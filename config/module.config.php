<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'PagSeguroRequest' => 'PagSeguro\Factory\PagSeguroRequestFactory',
            'ModuleOptions' => 'PagSeguro\Factory\ModuleOptionsFactory'
        )
    )
);
