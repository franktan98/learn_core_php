<?php
class Controller{
    protected $model ; 
    protected $view ; 
    
    private function init_class(){
        $this->model = null ; 
        $this->view = null ;        
    }
    
    public function __construct() {
        $this->init_class();
    }
}