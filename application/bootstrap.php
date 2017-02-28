<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	
	protected function _initAutoload()
	{
		$modelLoader = new Zend_Application_Module_Autoloader(array(
						'namespace' => '', //my classes have no specific prefix
						'basePath' => APPLICATION_PATH));

// 		Zend_Locale_Format::setOptions(array('locale' => 'en_US',
// 		'date_format' => 'dd.MMMM.YYYY'));
		
		return $modelLoader;
	}	
	
	protected function _initRoutes()
	{

		$config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routes.ini');
		$frontController = Zend_Controller_Front::getInstance();
		$router = $frontController->getRouter();
		$router->addConfig($config,'routes');
		
	}	

      protected function _initRegistry()
      {
	     //If we wanted to retrieve the registry later, using getResource() method:
	     //$registry = $bootstrap->getResource('Registry');        
    	     $registry = new Zend_Registry();
           return $registry;
      }
	
	protected function _initDb()
	{
		$resource = $this->getPluginResource('multidb');
		$resource = $resource->init();
		$db1 = $resource->getDb('db1');
		Zend_Registry::set('db1', $db1);
	}
	
// 	protected function _initPlugins() {
// 		$objFront = Zend_Controller_Front::getInstance();
// 		$objFront->registerPlugin(new My_Controller_Plugin_ACL(), 1);
// 		//$objFront->registerPlugin(new My_Auth_Adapter_MultiColumnDbTable(),NULL);
// 		return $objFront;
// 	}	

    protected function _initView()
    {
        // Initialize view
        $view = new Zend_View();
        $view->doctype('XHTML1_STRICT');
        $view->headTitle(': : TEMPLATE : :');
		$view->addHelperPath('ZendX/JQuery/View/Helper/', 'ZendX_JQuery_View_Helper');
        $view->addHelperPath('Zend/Dojo/View/Helper/', 'Zend_Dojo_View_Helper');
        $view->dojo()->setLocalPath( '../public/scripts/dojo/dojo/dojo.js');
        $view->addHelperPath('../application/views/helpers/', 'My_View_Helper');
        //Add path to ActionHelpers
        Zend_Controller_Action_HelperBroker::addPath(APPLICATION_PATH .'/controllers/helpers');
        // Add it to the ViewRenderer
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $viewRenderer->setView($view);
        // Return it, so that it can be stored by the bootstrap
        return $view;
    }	    
}

