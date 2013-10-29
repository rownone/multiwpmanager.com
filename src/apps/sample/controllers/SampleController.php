<?php

class SampleController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
    
	public function actionPage1()
	{
		$this->render('page1');
	}
    
	public function actionPage2()
	{
		$this->render('page2');
	}
}