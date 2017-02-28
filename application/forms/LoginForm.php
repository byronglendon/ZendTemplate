<?php

class Form_LoginForm extends Zend_Form
{
	public function __construct($option = NULL)
	{
		parent::__construct($option);
		$this->setName('Login Form');
		$this->setMethod('Post');
    }
    
	public function init(){
		//Enable Dojo
		//Zend_Dojo::enableForm($this);

 	$this->addElement('Text','UserName', array(
        'value'      => '',
        'label'      => 'User Name:',
        'trim'       => true,
 		'required'	 => true,
 		'Class'		=> 'form-control'	
	    )
	);
		
	$this->addElement('Password', 'Password', array(
	        'label'          => 'Password:',
	        'required'       => true,
	        'trim'           => true,
	        'invalidMessage' => 'Invalid password; ' .
	                            'must be at least 4 alphanumeric characters',
	    )
	);	
	
		$this->addElement(
	    'Submit',
	    'submit',
	    array(
	        'required'   => false,
	        'ignore'     => true,
	        'label'      => 'Submit',
		    )
		);
		
	//This method will set all decorators for all currently  registered form elements 
	$this->setElementDecorators(array(
		'ViewHelper',
	    'Errors',
	    array(array('data' => 'HtmlTag'), array('tag' => 'td')),
	    array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
	    array('Label', array('tag' => 'td'),
	)));	
	
	$this->UserName->setDecorators(array(
		'ViewHelper',
	    'Errors',
	    array(array('data' => 'HtmlTag'), array('tag' => 'td')),
	    array(array('row' => 'HtmlTag'), array('tag' => 'tr', 'closeOnly' => true, 'placement' => Zend_Form_Decorator_Abstract::APPEND)),
	    array('Label', array('tag' => 'td')),	
	    ));	

	$this->Password->setDecorators(array(
		'ViewHelper',
	    'Errors',
	    array(array('data' => 'HtmlTag'), array('tag' => 'td')),
	    array(array('row' => 'HtmlTag'), array('tag' => 'tr', 'closeOnly' => true, 'placement' => Zend_Form_Decorator_Abstract::APPEND)),
	    array('Label', array('tag' => 'td')),	
	    ));		
	    

	$this->submit->setDecorators(array(
		'ViewHelper',
	    'Errors',
	    array(array('data' => 'HtmlTag'), array('tag' => 'td')),
	    array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
	));		
	
	//The form itself 
	$this->setDecorators(array(
	    'FormElements',
	    array('HtmlTag', array('tag' => 'table')),
	    'Form',
	));		    
	}
}