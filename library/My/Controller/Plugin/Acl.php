<?php 

class My_Controller_Plugin_Acl extends Zend_Controller_Plugin_Abstract
{

	// Overwrite Zend_Controller_Plugin_Abstract preDispatch method
	public function preDispatch(Zend_Controller_Request_Abstract $request )
	{
		// Get the Role of the user - from instance (Zend_Session_Namespace::of Zend_Auth)
		if (Zend_Auth::getInstance()->hasIdentity())
		{
			//NameSpace Exists - get role
			$role = Zend_Auth::getInstance()->getStorage()->read()->Role;
		} 
		else 
		{ 
			$role = "guest" ; 
		}
		
		//$acl = Zend_Registry::get('acl');
		require_once '../library/My/Acl.php';		
		$acl = new My_Acl();

		if ($acl) 
		{
			if(!$acl->hasRole($role)){
				$role = "guest" ;
				$auth = Zend_Auth::getInstance();
				$authStorage = $auth->getStorage();
				$authStorage->write(array('Role'=>'guest')); //update role in auth storage
				//$storage = $auth->getInstance()->getStorage()->read();
				//Zend_Debug::dump($storage);
			}
			if (!$acl->isAllowed( $role ,$request->getControllerName(), $request->getActionName()))
			{
				$request->setControllerName('Error');
				$request->setActionName('denied');
			}
		}
	}
} 
?>