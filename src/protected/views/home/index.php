<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
    //echo Yii::app()->something->msg();
    
//    var_dump(Yii::app()->params['table_prefix']);
//    var_dump(Yii::app()->params['site_title']);
    if(Yii::app()->user->isGuest){
?>
    <h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

    <p>Congratulations! Installation successful.</p>
    <!--<p><a href="index.php?r=site/login">Click here to Login</a></p>-->
<?php
    }else{
        $this->breadcrumbs=array(
            'Home'=>array('index'),
            //'Manage',
        );
        
        //add dashboard menu
        $this->menuAdmin = array(
            array('label'=>'Manage Apps', 'url'=>array('apps/apps')),
            array('label'=>'Users', 'url'=>array('admin/users')),
        );
        
        //add apps menu
        $menu = array();
        foreach(Yii::app()->modules as $module=>$value){
            $rec = Apps::model()->find('name=:name',array(':name'=>$module));
            if($rec->active){
                if($module != 'gii' && $module != 'admin' && $module != 'apps')
                if(!empty($value['menuTitle'])){
                    $menu[] = array("label"=>ucwords($value['menuTitle']),
                        'url'=>array("$module/".$value['defaultController']));
                }elseif(!empty($value['defaultController'])){
                    $menu[] = array("label"=>ucwords($value['defaultController']),
                        'url'=>array("$module/".$value['defaultController']));
                }else{
                    $menu[] = array("label"=>ucwords($module),
                        'url'=>array("$module/"));
                }
            }
        }

        $this->menuApps=$menu;
        
?>
    <h1>Welcome <i><?php echo Yii::app()->user->name;?></i></h1>
    <p>Congratulations!</p>
<?php
    }
?>