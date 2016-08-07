<?php
require_once 'Customer.php';

class NewCustomer extends Customer {
    private $name ;
    
    private function init_class(){
        
    }
    
    public function __construct($source_name) {
        $this->name = $source_name ; 
        
        $this->init_class();
    }
    
    public function notice() {
        echo 'notice for new customer'.$this->name ;
    }

    public function service() {
        echo 'normal service';
    }

}