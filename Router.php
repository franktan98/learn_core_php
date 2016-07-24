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
    /**
     * @var string uri
     */
    private $uri ; 
    /**
     * @var string base path
     */
    private $base_path; 
    /**
     * @var string actual base directory
     */
    private $base_directory ; 
    /**
     * @var string base url
     */
    private $base_url ; 
    /**
     * @var string host name
     */
    private $host_name ; 
    
    /**
     * get all information needed ; 
     */
    private function init_class(){
        $this->base_directory = __DIR__ ; 
        $this->base_url = $_SERVER['PHP_SELF'];
        $this->host_name = $_SERVER['HTTP_HOST'];
        $this->base_path = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $request_uri = $_SERVER['REQUEST_URI'] ; 
        $this->uri = substr($request_uri , strlen($this->base_path));
/*
        if (strstr($this->uri, '?')) $this->uri = substr($this->uri, 0, strpos($this->uri, '?'));
        $this->uri = '/' . trim($this->uri, '/');

 */
    }

    public function get_base_directory(){
        return $this->base_directory ;
    }
    public function get_base_url(){
        return $this->base_url ;
    }
    public function get_host_name(){
        return $this->host_name ;
    }
    public function get_base_path(){
        return $this->base_path ;
    }
    public function get_uri(){
        return $this->uri ;
    }

    /**
     * call when class construct
     */
    public function __construct() {
        $this->init_class();
    }
}
