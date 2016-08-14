<?php
defined('SAFE_CALL') OR exit('No direct script access allowed');

require_once __DIR__.'/PDO_Model.php';

class ActionModel extends PDO_Model {
    protected function init_class(){
        $this->sql_string = 'SELECT * FROM action_code';
        $this->sql_parameter = null ;
    }
    
    public function __construct() {
        parent::__construct();
        $this->init_class();
    }
}
