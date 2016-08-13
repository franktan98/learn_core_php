<?php
require_once '../core/Controller.php';
require_once '../core/View.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Hello
 *
 * @author frank
 */
class Hello extends Controller{
    private function init_class(){
    }
    
    public function __construct() {
        parent::__construct();
        $this->init_class();
    }
    
    public function index(){
        $this->view = new View();
        $this->view->use_template(true);
        $this->view->set_page_title('a Hello World page from SimpleLite');
        $url_show = '../public/view/hello.php' ; 
        echo $this->view->show_page($url_show,null );
    }
}
