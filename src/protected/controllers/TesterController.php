<?php

class TesterController extends Controller
{
	public function actionIndex()
	{
        //$array["a"] = "Foo";
        //$array["b"] = "Bar";
        //$array["c"] = "Baz";
        //$array["d"] = "Wom";
        
        $apps = array();
        
        $apps[] = array('name'=>'admin','active'=>1);
        $apps[] = array('name'=>'helloword','active'=>1);
        $array['apps'] = $apps;
       // array_push($array,$apps);
        $str = serialize($array);
        var_dump($array);
        var_dump($str);
        
        $arr = unserialize($str);
        var_dump($arr);
		//$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}