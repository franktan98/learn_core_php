<?php
// dun forget to open the remark for LoadModule rewrite_module modules/mod_rewrite.so
// at httpd.conf and edit 
// .htaccess file add some modify

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Routing
 *
 * @author frank
 */
class Router {
    private $uri ; 
    private $basepath; 
    private $base_directory ; 
    private $base_url ; 
    private $base_host ; 
    
    private function init_class(){
        $this->base_directory = __DIR__ ; 
        $this->base_url = $_SERVER['PHP_SELF'];
        $this->base_host = $_SERVER['HTTP_HOST'];
        $this->basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $request_uri = $_SERVER['REQUEST_URI'] ; 
        $this->uri = substr($request_uri , strlen($this->basepath));
    }

    public function __construct() {
        $this->init_class();
        $this->index();
    }
    
    public function get_current_uri(){
        if (strstr($this->uri, '?')) $this->uri = substr($this->uri, 0, strpos($this->uri, '?'));
        $this->uri = '/' . trim($this->uri, '/');
        return $this->uri;
    }
    
    public function index(){
        echo '<br /> host : '. $this->base_host ; 
        echo '<br /> base path : '. $this->basepath ;
        echo '<br /> URI : '. $this->uri ;
        echo '<br /> directory : '. $this->base_directory ;
        echo '<br /> url : '. $this->base_url ; 
    }
}
