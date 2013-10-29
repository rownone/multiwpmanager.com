<?php
$module_name = basename(dirname(dirname(__FILE__)));
$default_controller = 'helloworld';
 
return array(
    'import' => array(
        'application.modules.' . $module_name . '.models.*',
    ),
    
    'modules' => array(
        $module_name => array(
            'defaultController' => $default_controller,
            'menuTitle'=>'Hello World',
        ),
    ),

);