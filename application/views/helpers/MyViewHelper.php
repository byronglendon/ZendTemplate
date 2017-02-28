<?php

class Zend_View_Helper_MyViewHelper
{
	public $view;
	
	public function getStockDetails($entries) {
		foreach($entries as $entry){
		if($i==1){	
			$bgcolor='#EBEBEB';	
			$i=0;
		} else {
			$bgcolor='#FFFFFF';	
			$i++;	
		}				
			$HTML .= "
				$entry <br>
			";
		}	
		return $HTML;	
	}
	
	public function setView(Zend_View_Interface $view) {
		$this->view = $view;
	}
}