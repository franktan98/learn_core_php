<?php
// Basic Object Oriented programming Inheritance
//a simple class to show how Inheritance of object oriented programming with php
namespace OO_Sample ; 

//use OO_Sample\Human;

class Staff extends Human{
    protected $id;
    protected $position;
    protected $account_id ; 
    
    public function __construct($source_name,$source_date_of_birth,
            $source_gender,  $source_id, $source_position) {
        parent::__construct($source_name,$source_date_of_birth,$source_gender);
        $this->id = $source_id;
        $this->position = $source_position;
    }
    
    public function __get($source_property) {
        $method = "get_$source_property";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
        //parent::__get($source_property);
    }
    
    public function set_account_id($source_account_id){
        $this->account_id = $source_account_id;
    }
    public function get_staff_id(){
        return $this->id;
    }
    
    public function get_staff_position(){
        return $this->position ; 
    }
    
}