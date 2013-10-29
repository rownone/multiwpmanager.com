<?php
/* @var $this AppsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Apps',
);

$this->menu=array(
	//array('label'=>'Create Apps', 'url'=>array('create')),
	array('label'=>'Manage Apps', 'url'=>array('admin')),
);
?>

<h1>Apps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
