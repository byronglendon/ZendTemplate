<?php

class IndexController extends Zend_Controller_Action 
{
    
    public function preDispatch()
    {
    	$this->baseUrl = $this->view->baseUrl();
    	$auth = Zend_Auth::getInstance();
    	if (!$auth->hasIdentity()) {
    		$this->_redirect('Auth/login');
    	} else {
    		$identity = $auth->getIdentity();
    		$this->UserID = $identity->UserID;
    		$this->Role = $identity->Role;
    		$this->authorized = $identity->Authorized;
    		$this->DepartmentID = $identity->DepartmentID;
    	}
    }
    
	public function init()
    {
    	$this->baseUrl = Zend_Controller_Front::getInstance()->getBaseUrl();  
    	$this->view->headScript()->appendFile($this->baseUrl.'/scripts/jquery.min.js');
    	$this->view->headScript()->appendFile($this->baseUrl.'/scripts/goTo.js'); 
    	$this->view->headScript()->appendFile($this->baseUrl.'/scripts/delete.js');
    	//$this->storage = new Zend_Session_Namespace('storage');
    	$this->setSessionVars;
    }
    
    private function getSessionVars($origin=NULL)
    {
    	$storage = new Zend_Session_Namespace('storage');
    	if (isset($storage->origionalData)) {
    		$originalData = unserialize($storage->origionalData);
    		$this->MerchantID = $originalData[MerchantID];
    		$this->CustomerID = $originalData[CustomerID];
    	} else {
     		echo "Session Timed Out @ $origin <br />";
     		echo "The maximum time for this session has expired. <br />";
     		 echo '<a href="'.$this->view->baseUrl().'/auth/logout" class="text">: : Logout</a>';
     		exit;
     	}
    }
    
    private function setSessionVars(array $sessionVars=NULL)
    {
    	$storage = new Zend_Session_Namespace('storage');
    	//Clear Any existing
    	//unset($storage->origionalData);
    	$originalData[PartnerID] = 11404; //Papilio UserID for SBSA Superuser
    	if($sessionVars){
	    	foreach($sessionVars as $key=>$value){
	    		$originalData[$key] = $value;
	    	}
    	}
    	$originalData = serialize($originalData);
    	$storage->origionalData = $originalData;
    }
    
    public function indexAction(){   	

    }
	
    
    function contains($needle, $haystack)
    {
    	return strpos($haystack, $needle) !== false;
    }
    

}
