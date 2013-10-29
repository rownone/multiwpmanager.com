<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

$config = array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'test site',
    'modulePath'=>dirname(__FILE__).'/../../apps' ,
 
    'defaultController' => 'home', 
    
    'theme'=>'blackboot',
    //'theme'=>'memories',
    //'theme'=>'abound',
    //'theme'=>'classic',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
        
        //'admin'=>array(
            //'defaultController' => 'users',
        //),
        
        //'sample'=>array(
            //'defaultController' => 'index',
        //),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
            'class' => 'WebUser',
		),
        
        'something'=>array(
            'class'=>'MyComponent',
            'someconfig'=>'someothervalue',
        ),
        
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
            'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
                'site/page/<view:\w+>'=>'site/page',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
         
            //'rules'=>array(
                //'<controller:\w+>/<id:\d+>'=>'<controller>/view',
                //'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>', // this is the rule you absolutely need for update to work
                //'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                //'<action>'=>'site/<action>'
            //),
            
            //'rules' => array(
                //'admin/<action:(dashboard|forgot|logout)>' => 'admin/<action>',
                //'admin/<module:\w+>/<action:\w+>/<id:\d+>' => '<module>/admin/<action>',
                //'admin/<module:\w+>/<action:\w+>' => '<module>/admin/<action>',
                //'admin/<module:\w+>' => '<module>/admin',
            //),

		),
		*/

		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=atestdb',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'home/error',
		),
        
		/*'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				
				array(
					'class'	=> 'CFileLogRoute',
					'categories' => 'system.*',
                    'levels' => 'error, warning, trace, info, debug',
                    'logFile' => 'application.log',  
				),
				
				array(
					'class' => 'CWebLogRoute',
					'categories' => 'system.db.CDbCommand',
					'showInFireBug' => true,
				),
				// uncomment the following to show log messages on web pages
				
				//array(
					//'class'=>'CWebLogRoute',
				//),
				
			),
		),*/
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
	),
);


$modules_dir = dirname(__FILE__).'/../../apps';
$handle = opendir($modules_dir);

while (false !== ($file = readdir($handle))) {
    if ($file != "." && $file != ".." && is_dir($modules_dir . "/".$file)) {        
        $config = CMap::mergeArray($config, require($modules_dir . "/".$file . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'main.php'));
    }
}
closedir($handle);
//var_dump($config);
//die();
return $config;