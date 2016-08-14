<?php

defined('SAFE_CALL') OR exit('No direct script access allowed');

require_once __DIR__.'/../../core/Model.php';
require_once __DIR__.'/../../library/Simple_PDO.php';

use SimpleLibrary\Simple_PDO ;

class PDO_Model extends Model {
    protected $sql_string ; 
    protected $sql_parameter ; 
    
    protected function init_class(){
        $this->sql_string = '';
        $this->sql_parameter = null ;
    }
    
    public function __construct() {
        parent::__construct();
        $this->init_class();
    }


    public function set_sql($source_string , $source_parameter = null ){
        $this->sql_string = $source_string ; 
        $this->sql_parameter = $source_parameter ; 
    }
    
    public function extract_data(){
        $return_value = null ;
        
        $this->database_use = new Simple_PDO( DATABASE_HOST,DATABASE_NAME,DATABASE_USER,DATABASE_PASSWORD );
        $this->database_use->preparing_connection();
        
        $this->database_use->__set('sql_string',$this->sql_string);
        $return_value = $this->database_use->execute_query($this->sql_parameter);
        
        $this->database_use->closing_connection();        
        
        return $return_value ; 
    }
}
