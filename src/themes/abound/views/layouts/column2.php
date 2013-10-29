<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

  <div class="row-fluid">
	<div class="span3">
		<div class="sidebar-nav">
        
		  <?php 
            /*
            $this->widget('zii.widgets.CMenu', array(
			//'type'=>'list',
			'encodeLabel'=>false,
			'items'=>array(
				array('label'=>'<i class="icon icon-home"></i>  Home <span class="label label-info pull-right">BETA</span>', 'url'=>array('/home/index'),'itemOptions'=>array('class'=>'')),
				//array('label'=>'<i class="icon icon-search"></i> About this theme <span class="label label-important pull-right">HOT</span>', 'url'=>'http://www.webapplicationthemes.com/abound-yii-framework-theme/'),
				//array('label'=>'<i class="icon icon-envelope"></i> Messages <span class="badge badge-success pull-right">12</span>', 'url'=>'#'),
				// Include the operations menu
				array('label'=>'OPERATIONS','items'=>$this->menu),
			),
			));*/?>
            <?php 
                if((Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId())!='home/index'){
            ?>
            <ul id="ywz">
            <li class="active"><a href="/yii/admin2/index.php?r=home/index"><i class="icon icon-home"></i>  Home <span class="label label-info pull-right">BETA</span></a></li>
            </ul>
            <br>
            <?php }?>
            <?php $this->widget('MainSidebarMenuWidget'); ?>
		</div>
        <br>
        
        
		<!--<div class="well"></div>-->
		
    </div><!--/span-->
    <div class="span9">
    
    <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
			//'homeLink'=>CHtml::link('Home'),
            'homeLink'=>false,
			'htmlOptions'=>array('class'=>'breadcrumb')
        )); ?><!-- breadcrumbs -->
    <?php endif?>
    
    <!-- Include content pages -->
    <?php echo $content; ?>

	</div><!--/span-->
  </div><!--/row-->


<?php $this->endContent(); ?>