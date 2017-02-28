<?php
class Model_Users extends Zend_Db_Table_Abstract
{
    protected $_table;

    /**
     * Retrieve table object
     * @return Model_DbTable_Users
     */
    public function getTable()
    {
        require_once APPLICATION_PATH . '/models/DbTable/Users.php';
        $this->_table = new Model_DbTable_Users;
        return $this->_table;
    }
    
    public function fetchAllEntries()
    {
        $select = $this->getTable()->select();
        $select->reset();
        $select->setIntegrityCheck(false);
        $select->from($this->getTable(), "*");
        $select->order("inserted");
        //echo $select->assemble();exit;       
        return $this->getTable()->fetchAll($select)->toArray();
    }  

    public function fetchEntries($RequestID,$MerchantID=NULL)
    {
        $select = $this->getTable()->select();
        $select->reset();
        $select->setIntegrityCheck(false);
        $select->from($this->_table, array('*'));
        $select->where("RequestID = ?", $RequestID);
        if($MerchantID) {
        	$select->where("MerchantID = ?", $MerchantID);
        }
        //echo $select->assemble();exit;       
        return $this->getTable()->fetchAll($select)->toArray();
    } 

    public function fetchEntry($UserID)
    {
        $table = $this->getTable();
        $select = $table->select()->where('UserID = ?', $UserID);
        //echo $select->assemble();exit;  
        $row = $table->fetchRow($select);
        if(COUNT($row)){ 
        	return $row->toArray();
        }else { 
        	return false;
        }
    } 
    
    
    public function getCount()
    {
        $table = $this->getTable();
    	$select = $table->select();
        $select->reset();
        $select->setIntegrityCheck(false);
        $select->from($this->_table,  "count(*) as Qty");
        //echo $select->assemble();exit;
        $row = $table->fetchRow($select)->toArray();
        return $row["Qty"];
    }     

    public function add(array $data)
    {         	
    	$table  = $this->getTable();
        $fields = $table->info(Zend_Db_Table_Abstract::COLS);
        unset($data[TerminalID]);
        foreach ($data as $field => $value) {
            if (!in_array($field, $fields)) {
                unset($data[$field]);
            }
        }       
        return $table->insert($data);
    }

     public function update(array $data,$id){  	
     	unset($data[TerminalRef]);
     	$table = $this->getTable();
        $fields = $table->info(Zend_Db_Table_Abstract::COLS);
        unset($data[TerminalID]);
        foreach ($data as $field => $value) {
            if (!in_array($field, $fields)) {
                unset($data[$field]);
            }
        }        	
     	$where = $table->getAdapter()->quoteInto('TerminalID = ?', $id);
     	return $table->update($data, $where);
     }
     
     public function delete($TerminalID){
     	$table = $this->getTable();
		$where = $table->getAdapter()->quoteInto('TerminalID = ?', $TerminalID);
		return $table->delete($where);        	
     }
     
    public function checkDuplicates($UserName)
    {
		$table  = $this->getTable();
    	$select = $table->select();
        $select->reset();
        $select->setIntegrityCheck(false);
        $select->from($this->getTable(), "*");
        $select->where("UserName = ?", $UserName);
        $row = $table->fetchRow($select);
        //echo $select->assemble();exit;       
        if(empty($row)){
        	return true;
        }else { return false; }
    } 
  
}          
?>