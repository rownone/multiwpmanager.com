<?php
/* @var $this HelloworldController */

$this->breadcrumbs=array(
	'Helloworld',
);

$this->menu=array(
	array('label'=>'Sample Menu1', 'url'=>array('page1')),
	array('label'=>'Sample Menu2', 'url'=>array('page2')),
);
?>
<h1>Page1</h1>
<?php
    foreach($model as $rec){
        var_dump($rec->name);
    }
?>