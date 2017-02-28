<?php
class Form_Search extends ZendX_JQuery_Form 
{

	public function init()
	{
		$this->setName('Search');
		
		$this->addElement('text', 'SerialNumber',
				array(
						'label'      => 'Serial Number:',
						'required'	=> True,
						'validators' => array(array('stringLength', false, array(10, 20))),
				        'class' => 'form-control'
				));

		$this->addElement('button','submit', array(
				'required' => false,
				'ignore'  => true,
				'Label' => 'Search',
		        'class'=>'searchbtn'
		));
	    		
		$this->SerialNumber->setDecorators(array(
		    'Viewhelper',
		    'Errors',
		    array(array('data' => 'HtmlTag'), array('tag' => 'div', 'class'=>'fields'))
		));
		
	$this->submit->setDecorators(array(
		'Viewhelper',
	    'Errors',
	    array(array('data' => 'HtmlTag'), array('tag' => 'div'))
 	));		    	 	
	
		//The form itself
		$this->setDecorators(array(
				'FormElements',
				array('HtmlTag', array('tag' => 'div')),
				'Form',
		));

	}
}
?>