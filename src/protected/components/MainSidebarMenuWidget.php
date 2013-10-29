<?php 

class MainSidebarMenuWidget extends Portlet
{
    public $menuAdminTitle = 'Admin';
    public $menuAppsTitle = 'Apps';
    public $menuSubTitle = 'Operations';
    
    public $menuAdmin = array();
    public $menuApps = array();
    public $menuSub = array();
    
    public $class = 'sidebar';
    public function run()
	{
        $this->menuAdmin = empty($this->menuAdmin) ? Yii::app()->controller->menuAdmin : $this->menuAdmin;
        $this->menuApps = empty($this->menuApps) ? Yii::app()->controller->menuApps : $this->menuApps;
        $this->menuSub = empty($this->menuSub) ? Yii::app()->controller->menu : $this->menuSub;
        
        $this->render('mainSidebarMenuWidget',
            array('menuAdmin'=>$this->menuAdmin,
                'menuAdminTitle'=>$this->menuAdminTitle,
                'menuApps'=>$this->menuApps,
                'menuAppsTitle'=>$this->menuAppsTitle,
                'menuSub'=>$this->menuSub,
                'menuSubTitle'=>$this->menuSubTitle,
                'class'=>$this->class));
    }
}

?>


