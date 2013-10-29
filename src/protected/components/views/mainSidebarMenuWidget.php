<?php
if(!empty($this->menuSub)){
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>$menuSubTitle,
    ));
    $this->widget('zii.widgets.CMenu', array(
        'items'=>$this->menuSub,
        'htmlOptions'=>array('class'=>$class),
    ));
    $this->endWidget();
}else{
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>$menuAdminTitle,
    ));

    $this->widget('zii.widgets.CMenu', array(
        //'items'=>$this->menuDashboard,
        'items'=>$menuAdmin,
        'htmlOptions'=>array('class'=>$class),
    ));

    $this->endWidget();
?>
<br>
<?php
//    if((Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId())=='home/index'){
//        $title = 'Apps';
//    }else{
//        $title = 'Operations';
//    }

    $this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>$menuAppsTitle,
    ));

    $this->widget('zii.widgets.CMenu', array(
        'items'=>$menuApps,
        'htmlOptions'=>array('class'=>$class),
    ));

    $this->endWidget();
}
?>

