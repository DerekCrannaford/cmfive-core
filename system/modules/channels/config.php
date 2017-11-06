<?php

Config::set('channels', array(
    'active' => true,
    'path' => 'system/modules',
    'topmenu' => true,
    'processors' => array(
    	'TestProcessor'
    ),
    "dependencies" => array(
        "zendframework/zend-mail" => "2.8.0",
        "zendframework/zend-serializer" => "2.8.0"
    )
));
