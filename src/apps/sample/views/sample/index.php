<?php
/* @var $this HelloworldController */

$this->breadcrumbs=array(
	'Sample',
);

$this->menu=array(
	array('label'=>'Page1', 'url'=>array('page1')),
	array('label'=>'Page2', 'url'=>array('page2')),
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
