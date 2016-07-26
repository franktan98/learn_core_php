<?php
namespace SimpleLibrary;
defined('SAFE_CALL') OR exit('No direct script access allowed');
    /**
     * this file develop by core php, as my personal php coding skill 
     * test on understanding, reference, and also a sample.
     * 
     * try to keep good pratice
     */

    /**
     * Description of Simple_Timer
     *  
     * this is simple timer library, it can record multiple begin time and 
     * simple timer, use when calculated multiple benchmarking process.
     * 
     * @author QQtan(franktan98@yahoo.com)
     * @since version 0.0.1
     */
    class Simple_Timer{
        private $timer_begin_point ;
        private $calculation_point ;
        private $decimel_show ; 
        
        /**
         * initiliaze of the class
         * set to default setting ready to use mode
         */
        private function init_class(){
            $this->timer_begin_point = array('default'=>microtime(true) );
            $this->calculation_point[0] = 0 ;
            $this->decimel_show = 4 ; 
        }
        
        /**
         * constructino of of the call 
         */
        public function __construct() {
            $this->init_class();
        }
        
        /**
         * use to set timer begin point to record as sub timer
         * 
         * @param type $source_begin_point set name for timer begin point 
         */
        public function set_microtimer($source_begin_point = 'default' ){
            $this->timer_begin_point[$source_begin_point] = microtime(true) ;
        }
        
        /**
         * by the name given, will return time the begin point recorded
         * 
         * @param string $source_begin_point namer of the begin point
         * @return float begin point micro time
         */
        public function get_microtimer($source_begin_point = 'default' ){
            return $this->timer_begin_point[$source_begin_point]  ;
        }

        /**
         * by the name given, will return time the check point recorded
         * 
         * @param string $source_check_point
         * @return float check point micro time
         */
        public function get_stop_point($source_check_point = 'default'){
            return $this->calculation_point[$source_check_point];
        }
        
        /**
         * set the name of the check point and the micro time of the check point
         * 
         * @param string $source_check_point
         */
        public function set_stop_point($source_check_point = 'default'){
            $this->calculation_point[$source_check_point] = microtime(true)  ;
        }
        
        /**
         * get time duration of begin point and check point
         * 
         * @param string $source_begin_point begin point name
         * @param string $source_check_point check point name
         * @return float return duration of 2 point
         */
        public function get_duration( $source_begin_point = 'default' , $source_check_point = 'default'){
            $this->calculation_point[$source_check_point] = microtime(true) ;
            
            return  number_format(
                    $this->calculation_point[$source_check_point] 
                    - $this->timer_begin_point[$source_begin_point] ,
                    $this->decimel_show );
        }
    }
?>