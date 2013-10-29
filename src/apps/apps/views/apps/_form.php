<?php
/* @var $this AppsController */
/* @var $model Apps */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'apps-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'path'); ?>
		<?php echo $form->textArea($model,'path',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'path'); ?>
	</div>


    <div class="row" >
        <?php echo $form->labelEx($model,'active',array('style'=>'float: left;')); ?>
        <?php echo $form->checkBox($model,'active',array('style'=>'float: left; margin-left: 10px;')); ?>
        <?php echo $form->error($model,'active'); ?>
    </div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->