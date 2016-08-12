<?php
namespace Tools;
defined('SAFE_CALL') OR exit('No direct script access allowed');
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
 * 
 * @todo Update it become simple RESFfull API and support.
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
    
    private $is_https ; 
    
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
        $this->is_https = $_SERVER['HTTPS'];
    }

    /**
     * call when class construct
     */
    public function __construct() {
        $this->init_class();
    }
    
    public function get_all_infor(){
        $return_value = array(
            'base_directory' => $this->base_directory ,
            'base_url'=> $this->base_url ,
            'host_name' => $this->host_name ,
            'base_path'=> $this->base_path,
            'uri'=> $this->uri,
            'is_https' => $this->is_https
        );
        return $return_value ; 
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
}
