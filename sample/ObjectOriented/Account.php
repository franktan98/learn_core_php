<?php

class Account {
    protected $id;
    protected $full_name;
    protected $company_name;
    protected $contact;
    protected $create_by ; 
    protected $create_date ; 

    public function __get($source_property) {
        $method = "get_$source_property";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }
    
    public function get_id(){
        return $this->id ; 
    }
    public function get_full_name(){
        return $this->full_name ; 
    }
    public function get_company_name(){
        return $this->company_name ; 
    }
    public function get_contact(){
        return $this->contact ; 
    }
    public function get_create_by(){
        return $this->create_by ; 
    }
    public function get_create_date(){
        return $this->create_date; 
    }
        
}
