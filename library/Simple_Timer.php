<?php
namespace SimpleLibrary;
defined('SAFE_CALL') OR exit('No direct script access allowed');
    /**
     * simple timer, use when calculated multiple benchmarking process.
     *
     */
    class Simple_Timer{
        private $timer_begin_point ;
        private $calculation_point ;
        private $decimel_show ; 
        
        private function init_class(){
            $this->timer_begin_point = array('default'=>microtime(true) );
            $this->calculation_point[0] = 0 ;
            $this->decimel_show = 4 ; 
        }
        
        public function __construct() {
            $this->init_class();
        }
        
        public function set_microtimer($begin_point = 'default' ){
            $this->timer_begin_point[$begin_point] = microtime(true) ;
        }
        
        public function get_microtimer($begin_point = 'default' ){
            return $this->timer_begin_point[$begin_point]  ;
        }

        public function get_stop_point($check_point = 'default'){
            return $this->calculation_point[$check_point];
        }
        
        public function set_stop_point($check_point = 'default'){
            $this->calculation_point[$check_point] = microtime(true)  ;
        }
        
        public function get_duration( $begin_point = 'default' , $check_point = 'default'){
            $this->calculation_point[$check_point] = microtime(true) ;
            
            return  number_format(
                                  $this->calculation_point[$check_point] - $this->timer_begin_point[$begin_point] ,
                                  $this->decimel_show );
        }
    }
?>