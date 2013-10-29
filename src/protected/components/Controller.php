<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column2';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menuAdmin=array();
    public $menuApps=array();
    public $menu=array();
    
    //public $menuAdminTitle=array();
    //public $menu=array();
    
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
    
    
    protected function beforeAction($action)
	{
		if( parent::beforeAction($action) )
		{
            if(!empty(Yii::app()->controller->module)){
                $moduleId = (Yii::app()->controller->module->id);
                $module = (get_class(Yii::app()->controller->module));
                
                //$cls = preg_replace("/\\\\/",'',str_replace(dirname(dirname(__FILE__)), '', dirname(__FILE__))).'.'.get_class($this);
                $cls = $moduleId.".".$module;
                $rec = Apps::model()->find('class=:class',array(':class'=>$cls));

                if($rec->active){
                    return true;
                }else{
                    throw new CHttpException(404,'The requested page does not exist.');
                }
            }
            return true;
        }
    }
}