<?php
class My_Helper_Reports
{
    public $view;

    public function showTableHeadings($headings)
    {
        return 'fooBar ' . $this->view->escape($headings);
    }

    
    public function showTableRows($rows)
    {
        return 'fooBar ' . $this->view->escape($rows);
    }
    
    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }
}



?>
