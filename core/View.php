<?php
defined('SAFE_CALL') OR exit('No direct script access allowed');

class View{
    protected $header;
    protected $footer;
    protected $footer_script;
    protected $header_script;
    private $page_title;
    private $page_contain;
    private $page_template_request ; 
    private $temp_cert_check ; 
    
    private function init_class(){  
        $this->header = '' ;
        $this->footer = '' ;
        $this->header_script = null ;
        $this->footer_script = null ;
        $this->temp_cert_check = null ;
        $this->page_template_request = true ; 
    }
    
    public function __construct() {
        $this->init_class();
    }
    
    public function index(){
    }
    
    public function skip_cert($source_temp){
        $this->temp_cert_check = $source_temp ; 
    }
    
    public function show_page( $source_page_name , $source_parameter = null){
        $return_value = '' ; 
        $header_show = '' ;
        $footer_show = '' ; 
        if ($this->page_template_request ){
            $this->set_header();
            $this->set_footer();
            $header_show = $this->header ;
            $footer_show = $this->footer ;
        }
        $return_value = $return_value . $this->header;
        
        //$page_parameter = $source_parameter ; 
        
        $url_execute = $source_page_name;
        $parameter = $source_parameter ; 
        
        //use CURL to execute and generate View or Report
        //$return_value = $return_value . $this->curl_post($url_execute , $parameter );
        $return_value = $return_value . $this->load_page($url_execute , $parameter );
        
        $return_value = $return_value ."\r\n". $this->footer;
        
        return $return_value;
    }
    
    private function load_page($source_url, array $source_parameter = null){
        //$file = file_get_contents($source_url, true);
        echo var_dump($source_parameter);
        is_null($source_parameter)?$source_parameter = array() : null ; 
        ob_start();
        foreach($source_parameter as $key => $value ){
            $$key = $value ;
        }
        require $source_url ; 
        $return_value = ob_get_clean();
        return $return_value;
    }
    
    private function curl_post($source_url, array $source_post = null , array $source_options = array()){
    // this part of code is copy from php.net curl-exec manual
    // Contributed by David from Code2Design.com
    // just change some variable name make it more understandable 
        $defaults = array(
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 1,
            CURLOPT_URL => $source_url,
            CURLOPT_FRESH_CONNECT => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FORBID_REUSE => 1,
            CURLOPT_TIMEOUT => 2,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => http_build_query($source_post)
        );

        if ( !($this->temp_cert_check === null ) ){
            $source_options = $this->temp_cert_check ;
        }
        $curl_handler = curl_init();
        
        curl_setopt_array($curl_handler, ($source_options + $defaults));
        
        if( ! $return_result = curl_exec($curl_handler) )
        {
//            $return_result = 'tets';
            trigger_error(curl_error($curl_handler));
        }
        
//var_dump(curl_exec($curl_handler)); 
//var_dump(curl_getinfo($curl_handler)); 
//var_dump(curl_error($curl_handler)); 
        curl_close($curl_handler);
        return $return_result;
    }
    
    public function use_template($template_request){
        $this->page_template_request = $template_request ;
    }
    
    public function set_page_title($source_title='Default'){
        $this->page_title = $source_title ; 
    }
    
    public function set_header($source_header=''){
        $this->header = <<<EOD
<!DOCTYPE html>
<html>
    <head><title>$this->page_title</title></head>
    <body>
EOD;
        if ( strlen($source_header) >= 1 ){
            $this->header = $source_header ; 
        }
    }
    
    public function set_footer($source_footer =''){
        // default 
        $this->footer = <<<EOD
    </body>
</html>
EOD;
        if ( strlen( $source_footer ) >= 1 ){
            $this->footer = $source_footer ;
        }
    }
    
    public function set_footer_script($source_script ){
        $this->footer_script[] = $source_script ; 
    }
    
    public function set_header_script($source_script ){
        $this->header_script[] = $source_script ; 
    }
}