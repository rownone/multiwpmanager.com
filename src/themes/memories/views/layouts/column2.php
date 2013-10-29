<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
 <div class="span3">
         <?php $this->widget('MainSidebarMenuWidget'); ?>
	
</div>
<div class="span9">
	
		<?php echo $content; ?>
	
</div>

<?php $this->endContent(); ?>