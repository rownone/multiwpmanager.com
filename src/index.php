<?php
// change the following paths if necessary
require(dirname(__FILE__).'/install/library.php');
require(dirname(__FILE__).'/install/install.php');
$yii=dirname(__FILE__).'/core/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
//Yii::createWebApplication($config)->run();

$app = Yii::createWebApplication($config);

//var_dump(Yii::app()->modules);
//die();

foreach(Yii::app()->modules as $mod=>$value){
    $rec = Apps::model()->find('name=:name',array(':name'=>$mod));
    if($rec===null){
        $newApps = new Apps();
        $newApps->name = $mod;
        $newApps->title = !empty($value['menuTitle'])?$value['menuTitle']:$mod;
        $newApps->class = $value['class'];
        $newApps->path = $mod;
        $newApps->active = 0;
        $newApps->save();
    }
}

$parameters = Options::model()->findAll();
 
foreach( $parameters as $parameter ){
    $app->params->add($parameter->name, $parameter->value);
}
$app->run();

