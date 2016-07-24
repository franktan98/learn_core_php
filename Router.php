<?php
namespace Tools;
/**
 * Description of Router class
 * this router use to collect all infromation pass from the url or uri
 * including the base directory of the main page
 * 
 * reminder 
 * dun forget to open the remark for LoadModule rewrite_module modules/mod_rewrite.so
 * at httpd.conf and edit 
 * .htaccess file add some modify
 * 
 * @author QQtan(franktan98@yahoo.com)
 * @since version 0.0.1
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
}
