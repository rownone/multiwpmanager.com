<?php

class AppsModule extends CWebModule
{
    private $_assetsUrl;

    public function getAssetsUrl()
    {
        //var_dump();
        if ($this->_assetsUrl === null)
            $this->_assetsUrl = Yii::app()->getAssetManager()->publish(
                Yii::getPathOfAlias(Yii::app()->controller->module->id.'.assets') );
        return $this->_assetsUrl;
    }

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'apps.models.*',
			'apps.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
    
    public function createTable()
    {
        $prefix = Yii::app()->params['table_prefix'];
        if (Yii::app()->db->schema->getTable($prefix.'_apps') === null){
            
            Yii::app()->db->createCommand("
                CREATE TABLE IF NOT EXISTS `".$prefix."_apps` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(128) NOT NULL,
                `title` varchar(128) NOT NULL,
                `class` varchar(128) NOT NULL,
                `path` longtext NOT NULL,
                `active` int(11) NOT NULL,
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;")->execute();
            
        }
    }
}
