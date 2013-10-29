<?php
/* @var $this AppsController */
/* @var $model Apps */

$this->breadcrumbs=array(
	'Apps'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Apps', 'url'=>array('index')),
	array('label'=>'Manage Apps', 'url'=>array('admin')),
);
?>

<h1>Install Apps</h1>

<link rel="stylesheet" href="<?php echo $this->module->assetsUrl; ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $this->module->assetsUrl; ?>/css/jquery.fileupload-ui.css">
<noscript><link rel="stylesheet" href="<?php echo $this->module->assetsUrl; ?>/css/jquery.fileupload-ui-noscript.css"></noscript>

    <!-- The file upload form used as target for the file upload widget -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Upload apps...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    <br>
    <br>
    <div id='re' ></div>


<script src="<?php echo $this->module->assetsUrl; ?>/js/jquery.min.js"></script>
<script src="<?php echo $this->module->assetsUrl; ?>/js/vendor/jquery.ui.widget.js"></script>
<script src="<?php echo $this->module->assetsUrl; ?>/js/jquery.iframe-transport.js"></script>
<script src="<?php echo $this->module->assetsUrl; ?>/js/jquery.fileupload.js"></script>

<script>

$(function () {


	var url = '<?php echo Yii::app()->createUrl('apps/apps/upload');?>';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        complete: function (e, data) {
            $('<p/>').text(jQuery.parseJSON(e.responseText).result.files).appendTo('#files');
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
