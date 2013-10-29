<?php
/* @var $this AppsController */
/* @var $model Apps */

$this->breadcrumbs=array(
	'Apps'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Apps', 'url'=>array('index')),
	array('label'=>'Install Apps', 'url'=>array('install')),
    //array('label'=>'Create Apps', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#apps-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Apps</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php /*?>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php */?>

<?php 

    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'apps-grid',
	'dataProvider'=>$model->searchApps(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
        'name',
        'title',
		//'path',
		array(
            'name'=>'active',
            'filter'=>CHtml::listData(Apps::getYesNoFilter(), 'id', 'val'),
            'value'=>'empty($data->active)?"No":"Yes"',
        ),
		array
        (
            'header'=>'Actions', // add headers this way
            'class'=>'ButtonColumn',
            'evaluateOption'=>true,
            'evaluateLabel'=>true,
            'template'=>'{activate}{del}',
            'buttons'=>array
            (
                'activate' => array
                (
                    'label'=>'empty($data->active) ? "Activate" :  "Deactivate"',
                    'click'=>"function(){
                            jQuery.ajax({
                                'type':'POST',
                                'data': {id:$(this).attr('id'),activate:$(this).html()=='Activate'?1:0},
                                'success':function(data){
                                    //$('#loading').hide();
                                    $.fn.yiiGridView.update('apps-grid');  
                                },
                                'url':'".Yii::app()->createUrl('/apps/apps/activate')."','cache':false
                            });

                         
                           return false;
                        }
                     ", 
                    'url'=>'"javascript:;"',
                     'options'=>array(
                        'id'=>'$data->id',
                        //'class'=>' empty($data->active) ? "activate" :  "deactivate" ',
                    ),
                ),                
                'del' => array
                (
                    'label'=>'"Delete"',
                    'click'=>"function(){debugger;
                           $.fn.yiiGridView.update('apps-grid',{
                                data:{
                                    //enrollment_id:-1,
                                },
                                complete: function(jqXHR, status) {
                                    //$('#loading').hide();
                                }
                            });
                           return false;
                        }
                     ", 
                    'url'=>'"javascript:;"',
                     'options'=>array(
                        'id'=>'$data->id',
                        //'class'=>'"del"',
                    ),
                ),
            ),
        ),
	),
)); ?>
