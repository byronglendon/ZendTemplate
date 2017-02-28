<?php

class Model_DbTable_Users extends Zend_Db_Table_Abstract
{
    protected $_name = 'Users';
    protected $_primary = array('UserID');
    
    public function __construct(){
    	$db1 = Zend_Registry::get('db1');
    	$this->_setAdapter($db1);
    	//Zend_Debug::dump($this); exit;
    }
}


?>