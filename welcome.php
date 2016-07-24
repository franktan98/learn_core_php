<?php
    /**
     * a replace of index.php
     * <p>
     * the first file to execute in this directory
     * if change to index.php .htaccess also have to change 
     * </p>
     * load related php file
     */
    require_once 'config.php' ;
    require_once 'loading_list.php' ;
    require_once 'Router.php' ;

    use Tools\Router ;
    /**
     * this class is the main class to call when execute
     * @author QQtan(franktan98@yahoo.com)
     * @since version 0.0.1
     */
    class Main{
        public $system_benchmark ;
        public $router ; 
        public $debug_message ; 
                
        /**
         * this function is to class initial
         */
        private function init_class(){
            // setting the debug message and benchmark timer
            $this->system_benchmark = new Simple_Timer();
            $this->debug_message = ''; 
            
            $this->router = new Router( );
            
            // echo '<br /> current URI : '.$this->router->get_current_uri();
        }
        
        /**
         * class construction 
         */
        public function __construct() {
            $this->init_class();
        }
        
        /**
         * first call of the class.
         * @return void
         */
        public function index(){
            echo '<br /> Base Directory : '. $this->router->get_base_directory();
            echo '<br />'; 
            echo '<br /> Host Name : '. $this->router->get_host_name();
            echo '<br /> Base PATH  : '. $this->router->get_base_path();
            echo '<br /> URI : '. $this->router->get_uri();
            echo '<br />'; 
            echo '<br /> call when redirect 404.';
            echo '<br /> URL : '. $this->router->get_base_url();
            echo '<br />'; 
            echo '<br />duration to stop point 1 : '. $this->system_benchmark->get_duration(); 
        }
    }
    $system = new Main();
    
    $system->index();
    
?>