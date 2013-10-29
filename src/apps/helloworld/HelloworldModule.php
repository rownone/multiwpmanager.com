<?php

class HelloworldModule extends CWebModule
{
    public $menuTitle;
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'helloworld.models.*',
			'helloworld.components.*',
		));

        $this->createTable();
	}

	public function beforeControllerAction($controller, $action)
	{
        
		if(parent::beforeControllerAction($controller, $action)){
			// this method is called before any module controller action is performed
			// you may place customized code here
            
            return true;
		}else
			return false;
	}
    
    public function createTable()
    {
        $prefix = Yii::app()->params['table_prefix'];
        if (Yii::app()->db->schema->getTable($prefix.'_helloworld') === null){
            
            Yii::app()->db->createCommand()->createTable($prefix.'_helloworld', array(
                'id' => 'pk',
                'name' => 'string NOT NULL',
            ), 'ENGINE=InnoDB');
            
            //sample insert data
            $sql = "insert into ".$prefix."_helloworld (name) values (:name)";
            
            $parameters = array(":name"=>'hello world 1');
            Yii::app()->db->createCommand($sql)->execute($parameters);
            
            $parameters = array(":name"=>'hello world 2');
            Yii::app()->db->createCommand($sql)->execute($parameters);
            
            $parameters = array(":name"=>'hello world 3');
            Yii::app()->db->createCommand($sql)->execute($parameters);
        }
    }
}
