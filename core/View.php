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
        $curent_datetime = date("Y-m-d H:i:s");
        $this->header = <<<EOD
<!DOCTYPE html>
<html>
    <head><title>Default $curent_datetime </title></head>
    <body>
EOD;
        $this->footer = <<<EOD
    </body>
</html>
EOD;
    }
    
    public function __construct() {
        $this->init_class();
    }
    
    public function index(){
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
        
        $url_execute = $source_page_name;
        $parameter = $source_parameter ; 
        
        //use CURL to execute and generate View or Report
        $return_value = $return_value . $this->load_page($url_execute , $parameter );
        
        $return_value = $return_value ."\r\n". $this->footer;
        
        return $return_value;
    }
    
    private function load_page($source_url, array $source_parameter = null){
        //$file = file_get_contents($source_url, true);
        is_null($source_parameter)?$source_parameter = array() : null ; 
        ob_start();
        foreach($source_parameter as $key => $value ){
            $$key = $value ;
        }
        require __DIR__.'/'.$source_url ; 
        $return_value = ob_get_clean();
        return $return_value;
    }
    
    public function use_template($template_request){
        $this->page_template_request = $template_request ;
    }
    
    public function set_page_title($source_title='Default'){
        $this->page_title = $source_title ;
    }
    
    public function set_header($source_header=''){
        if ( strlen($source_header) >= 1 ){
            $this->header = $source_header ; 
        }
    }
    
    public function set_footer($source_footer =''){
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