<?php
namespace Tools;
defined('SAFE_CALL') OR exit('No direct script access allowed');

//use \SimpleXMLElement ; 
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
    
    private $router_list ;
    private $xml_route_list_file ;
    private $loaded_class ; 
    
    /**
     * get all information needed ; 
     */
    private function init_class(){
        $this->base_directory = __DIR__ ; //e.g. /tmp/folder
        $this->base_url = $_SERVER['PHP_SELF']; // filename of current execute script
        $this->host_name = $_SERVER['HTTP_HOST']; // e.g. localhost:8080
        $this->base_path = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $request_uri = $_SERVER['REQUEST_URI'] ; 
        $this->uri = substr($request_uri , strlen($this->base_path));
        $this->xml_route_list_file = 'RouteList.xml';
        $this->loaded_class = null;
        //$this->load_router_list() ;
        //$this->route();
    }
    
    private function load_router_list(){
        $list = simplexml_load_file('RouteList.xml');
        $router_counter = 0 ;

        foreach( $list as $item ){
            $this->router_list[$router_counter]['key'] = $item->key ; 
            $this->router_list[$router_counter]['link'] = $item->link ; 
            
            $router_counter++;
        }
    }
    
    private function route(){
        $temp = explode( '/' , $this->uri );
        $route_link = '' ;
        $source_key = $temp[0] ;

        $list = $this->router_list; 
        foreach( $list as $item ){
            in_array( $source_key  , $item ) ? $route_link = $item['link'].'' : null ; 
        }
        file_exists($route_link.'.php') ? $this->load_file($route_link , $temp) : null ;
    }
    
    private function load_file($source_file , $source_parameter ){
        require_once $source_file .'.php';
        class_exists($source_file)? $this->load_class( $source_file , $source_parameter ) : null ;
    }
    
    private function load_class( $source_class , $source_parameter ){
        $function_call = DEFAULT_FUNCTION ; 
        $this->loaded_class = new $source_class();
        switch ( count($source_parameter) ){
            case 0 :
                $function_call = DEFAULT_FUNCTION ; 
            case 1 : 
                $function_call = DEFAULT_FUNCTION ; 
                break;
            case 2 : 
                $function_call = $source_parameter[1] ; 
                break;
            case 3 : 
                $function_call = $source_parameter[1] ; 
                $this->preparing_parameter($source_parameter);
                break;
            default : 
                $function_call = $source_parameter[1] ; 
                $this->preparing_parameter($source_parameter);
                break;
        }
        method_exists($this->loaded_class , $function_call)? $this->loaded_class->$function_call() : null ;
    }
    
    private function preparing_parameter( $source_parameter){
        $return_value  = 0 ;
        
        var_dump($source_parameter);
        
        return $return_value ; 
    }

    /**
     * call when class construct
     */
    public function __construct() {
        $this->init_class();
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
