<?php 
class My_Acl extends Zend_Acl
{
	public function __construct()
    {	
    	$this->addRole(new Zend_Acl_Role('guest'));
	    $this->addRole(new Zend_Acl_Role('assessment'), 'guest');
	    $this->addRole(new Zend_Acl_Role('stores'), 'assessment');
	    $this->addRole(new Zend_Acl_Role('repairs'), 'assessment');
	    $this->addRole(new Zend_Acl_Role('supervisor'), repairs);
	    $this->addRole(new Zend_Acl_Role('admin'), repairs);

	    $this->add(new Zend_Acl_Resource('Index'));
	    $this->add(new Zend_Acl_Resource('Receive'));
	    $this->add(new Zend_Acl_Resource('Assess'));
	    $this->add(new Zend_Acl_Resource('Error'));
	    $this->add(new Zend_Acl_Resource('error'));
	    $this->add(new Zend_Acl_Resource('Auth'));
	    $this->add(new Zend_Acl_Resource('Login'));
	    $this->add(new Zend_Acl_Resource('login'));
	    $this->add(new Zend_Acl_Resource('logout'));
	    $this->add(new Zend_Acl_Resource('index'));
	    $this->add(new Zend_Acl_Resource('allocatesearch'));
	    $this->add(new Zend_Acl_Resource('allocateredirect'));
	    $this->add(new Zend_Acl_Resource('Repairs'));
	    $this->add(new Zend_Acl_Resource('reparsearch'));
	    $this->add(new Zend_Acl_Resource('Settings'));
	    $this->add(new Zend_Acl_Resource('Quality'));
	    $this->add(new Zend_Acl_Resource('Transfer'));
	    $this->add(new Zend_Acl_Resource('Reports'));
	    $this->add(new Zend_Acl_Resource('Test'));
	    $this->add(new Zend_Acl_Resource('Billing'));
	    $this->add(new Zend_Acl_Resource('Flag'));
	    

   //-- $this->allow(ROLE, RESOURCE, PRIVILIGE) --//           
    	$this->allow('guest', array('Index', 'Error', 'Auth', 'Login','login','error','logout'), null);
    	$this->deny('guest','Settings');
    	$this->allow('assessment', null, null);	 
    	$this->deny('assessment','Settings');
    	$this->allow('stores', 'Transfer');
    	$this->deny('stores','Settings');
    	$this->allow('repairs', null, null);	
    	$this->deny('repairs','Settings');
    	$this->deny('repairs','Transfer');
    	$this->allow('admin', 'Settings');
    	$this->allow('admin','Transfer');
	    $this->allow('admin', null, null);	    	
    }

}