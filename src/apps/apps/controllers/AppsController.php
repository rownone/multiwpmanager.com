<?php

class AppsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','install','upload','activate'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
    
    public function actionActivate()
    {
        $activate = $_POST['activate'];
        $id = $_POST['id'];
        
        $apps = Apps::model()->findByPk($id);
        $apps->active = $activate;
        echo $apps->save();
        
    }
    
    public function actionInstall()
    {
        $this->render('install');
    }
    
    
    public function actionUpload()
    {
        header('Content-type: application/json');
        $filename = stripslashes($_FILES['files']['name'][0]);
	 
        preg_match('/([^\\/\:*\?"<>|]+)(?:\.([^\\/\:*\?"<>|\.]+))$/',$filename,$matches);
        $ext = strtolower($matches[2]);
        $siteurl = '';
        //if (($ext != "jpg") && ($ext != "jpeg") && ($ext != "png") && ($ext != "gif")){
        if ($ext != "zip"){
            echo "<p><b class=\"err\">Can't upload file because of unknown extension but details were saved!</b></p>";
        }else {    
            $start = time();
            $f = $start.".".$ext;
            $newname = "uploads/".$f;
            $copied = move_uploaded_file($_FILES["files"]["tmp_name"][0],$newname);
            $fileName = $siteurl."/".$newname;  

            $error = '';
            $zip = new ZipArchive;
            $res = $zip->open($newname);
            
            if ($res === TRUE) {
                $zip->extractTo("apps/");
                $zip->close();
                $error = "WOOT! $fileName extracted to uploads";
            } else {
                $error = "Doh! I couldn't open $fileName";
            }
            
            if (!$copied){
                echo "<p><b class=\"err\">A problem occured file uploading but details were saved!</b></p>";
            }

            echo CJSON::encode(array('result'=>array('files'=>$fileName,'error'=>$error)));
        }
    }
    
    
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Apps;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Apps']))
		{
			$model->attributes=$_POST['Apps'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Apps']))
		{
			$model->attributes=$_POST['Apps'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
       
        $model=new Apps('search');
		$model->unsetAttributes();  // clear any default values
		
        if(isset($_GET['Apps']))
            $model->attributes=$_GET['Apps'];
        
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        
		$model=new Apps('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Apps'])){
			var_dump($_GET['Apps']);
            $model->attributes=$_GET['Apps'];
        }
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Apps the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Apps::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Apps $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='apps-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
