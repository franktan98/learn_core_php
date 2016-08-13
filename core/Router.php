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
    private $uri_g ; 
    /**
     * @var string base path
     */
    private $base_path_g; 
    /**
     * @var string actual base directory
     */
    private $base_directory_g ; 
    /**
     * @var string base url
     */
    private $base_url_g ; 
    /**
     * @var string host name
     */
    private $host_name_g ;
    
    private $is_https_g ; 
    private $method_g ; 

    private $router_list ;
    private $xml_route_list_file ;
    private $loaded_class ; 
    
    /**
     * get all information needed ; 
     */
    private function init_class(){
        isset($_SERVER['HTTPS'])? $this->is_https = true : $this->is_https = false ;  
        $this->method_g = $_SERVER['REQUEST_METHOD'];
        $this->base_directory_g = __DIR__ ; //e.g. /tmp/folder

        $this->base_url_g = $_SERVER['PHP_SELF']; // filename of current execute script
        $this->host_name_g = $_SERVER['HTTP_HOST']; // e.g. localhost:8080
        $this->base_path_g = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $this->base_path_g = str_replace('core/','',$this->base_path_g);
        $this->base_path_g = str_replace(CONTROLLERS_DIR,'',$this->base_path_g);
        defined('BASE_PATH')  OR define('BASE_PATH', $this->base_path_g.'');
        $request_uri = $_SERVER['REQUEST_URI'] ; 
        // use SERVER_PORT == 443 TO CHECK
        $this->uri_g = substr($request_uri , strlen($this->base_path_g));
/*        
        echo '<br /> request uri : '.$request_uri ; 
        echo '<br /> base url : '. $this->base_url_g ; 
        echo '<br /> host name  : '. $this->host_name_g ; 
        echo '<br /> base path  : '. $this->base_path_g ; 
        echo '<br /> uri : '. $this->uri_g ;
        echo '<br /> ';

        echo '<br /> Request method: '. $this->method_g ; 
        echo '<br /> is https : '. var_dump($this->is_https_g );
        echo '<br /> base directory : '. $this->base_directory_g ; 
*/        
        $this->xml_route_list_file = ROUTER_LIST ;
        $this->loaded_class = null;
        
        $this->load_router_list() ;
        $this->route();
    }
    
    private function load_router_list(){
        $list = simplexml_load_file($this->xml_route_list_file);
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
//        echo var_dump('../'.CONTROLLERS_DIR .  $route_link.'.php');
//        echo var_dump(file_exists( '../'.CONTROLLERS_DIR .  $route_link.'.php'));
        file_exists('../'.CONTROLLERS_DIR .  $route_link.'.php') ? $this->load_file($route_link , $temp) : null ;
    }
    
    private function load_file($source_file , $source_parameter ){
        require_once '../'.CONTROLLERS_DIR.$source_file .'.php';
        class_exists($source_file)? $this->load_class( $source_file , $source_parameter ) : null ;
    }
    
    private function load_class( $source_class , $source_parameter ){
        echo var_dump($source_class);
        echo var_dump($source_parameter);
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
        $function_call = 'index';
        method_exists($this->loaded_class , $function_call)? $this->loaded_class->$function_call() : null ;
    }
    
    private function preparing_parameter( $source_parameter){
        $return_value  = 0 ;
        
        var_dump($source_parameter);
        
        $ref = new ReflectionMethod($this, 'myFunction');
        foreach( $ref->getParameters() as $param) {
            $name = $param->name;
            $this->$name = $$name;
        }
        
        return $return_value ; 
    }

    /**
     * call when class construct
     */
    public function __construct() {
        $this->init_class();
    }

    /**
     * lazy get for php
     * version support (PHP 5 >= 5.1.0, PHP 7) aupport property_exists function
     * by using postfix _s,_g or _sg to define set or get function to the property define.
     * simple, easy, lazy and clear for lazy programmer.
     * 
     * @param string $source_property
     * @return any_datatype any data type may return by the property may be array ,object or a string
     */
    public function __get($source_property) {
        $property_name_sg = $source_property . '_sg';
        $property_name_g = $source_property . '_g';
        if (property_exists($this, $property_name_sg)) {
            return $this->$property_name_sg;
        }
        if (property_exists($this, $property_name_g)) {
            return $this->$property_name_g;
        }
    }

    /**
     * lazy set for php
     * version support (PHP 5 >= 5.1.0, PHP 7) aupport property_exists function
     * by using postfix _s,_g or _sg to define set or get function to the property define.
     * simple, easy, lazy and clear for lazy programmer.
     * 
     * @param string $source_property the name of the property
     * @param any_datatype $source_value this may i=b an object,array or any datatype
     */
    public function __set($source_property,$source_value) {
        $property_name_sg = $source_property . '_sg';
        $property_name_s = $source_property . '_s';
        if (property_exists($this, $property_name_sg)) {
            $this->$property_name_sg = $source_value;
        }
        if (property_exists($this, $property_name_s)) {
            $this->$property_name_s = $source_value;
        }
    }
}
