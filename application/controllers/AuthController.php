<?php 
class AuthController extends Zend_Controller_Action
{
    public function init()
    {
       	$this->_helper->layout->setLayout('login');
    }	
	
	public function loginAction()
	{
		if(Zend_Auth::getInstance()->hasIdentity()){
			$options = array();
			$this->_redirect('Index/index',$options);
		}
		$form = new Form_LoginForm();
		$this->view->form = $form;
		if($this->getRequest()->isPost()){
			$formData = $this->getRequest()->getPost();		
			//if($form->isValid($formData)){
				$authAdapter = $this->getAuthAdapter();
				$authAdapter->setIdentity($formData[UserName])
							->setCredential($formData[Password]);
				$auth = Zend_Auth::getInstance();
				$result = $auth->authenticate($authAdapter);
				if($result->isValid()){
					$identity = $authAdapter->getResultRowObject(); //get user details from Db
					$authStorage = $auth->getStorage(); 
					$authStorage->write($identity); //write identity ino persistant storage
					$options = array();
					$this->_redirect('Index/index',$options);
				}else {
					$this->view->returnMessage = "Invalid Login";
				}					
			//}
		}
	}
	
    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('Auth/login');
    }
	
	private function getAuthAdapter()
	{
		$authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
		$authAdapter->setTableName('Users')
					->setIdentityColumn('UserName')
					->setCredentialColumn('Password');
					//->setCredentialTreatment('MD5')
		return 	$authAdapter;				
	}
       
}