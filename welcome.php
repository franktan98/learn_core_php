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
    date_default_timezone_set('Asia/Kuala_Lumpur');

    use Tools\Router ;
    use SimpleLibrary\Simple_Log ;
    use SimpleLibrary\Simple_Timer ;
    /**
     * this class is the main class to call when execute
     * @author QQtan(franktan98@yahoo.com)
     * @since version 0.0.1
     */
    class SimpleSystem{
        public $system_benchmark ;
        public $router ; 
        public $debug_message ; 
        public $log_handler ; 
                
        /**
         * this function is to class initial
         */
        private function init_class(){
            // setting the debug message and benchmark timer
            $this->system_benchmark = new Simple_Timer();
            $this->router = new Router( );

            $this->debug_message = ''; 

            $this->log_handler = new Simple_Log();

            $this->log_handler->set_log_environment(
                    Simple_Log::MESSAGE_LEVEL_DEBUG,'./log/','test',array());
            
            // this email when error function not yet testing 
            // error_log($source_message , 1,"franktan98@yahoo.com");    
            
            $this->log_handler->log_me('debug','URL Receive : '.$this->router->get_uri());
            $this->log_handler->log_me('debug',
                    'Full URL Process : '. $this->router->get_host_name().$this->router->get_base_url());
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
        }
    }

    $system = new SimpleSystem();
    
    $system->index();
    
?>