<?php
namespace SimpleLibrary;
defined('SAFE_CALL') OR exit('No direct script access allowed');
/*
 */

/**
 * Description of Simple_Log
 *
 * @author frank
 */
class Simple_Log{
    // follow 
    // The list of severities is also defined by RFC 3164:
    
    // System is unuseable
    // totally loss of the system
    const MESSAGE_LEVEL_EMERGENCY = 0;
    // Should be correct immediately 
    // loss of primary connection
    const MESSAGE_LEVEL_ALERT  = 1;
    // Critical condition 
    // A failure in the system's primary application.
    const MESSAGE_LEVEL_CRITICAL  = 2;
    // Error Condition 
    //An application has exceeded its file storage limit and attempts to write are failing.
    const MESSAGE_LEVEL_ERROR = 3;
    // A non-root file system has only 2GB remaining.
    // May indicate that an error will occur if action is not taken
    const MESSAGE_LEVEL_WARNING  = 4;
    //  	Events that are unusual, but not error conditions.
    const MESSAGE_LEVEL_NOTICE  = 5;
    // 	Normal operational messages that require no action.
    // 	An application has started, paused or ended successfully.
    const MESSAGE_LEVEL_INFORMATION = 6;
    // Information useful to developers for debugging the application.
    const MESSAGE_LEVEL_DEBUG = 7;
    
    private $log_prefix ;
    private $log_directory ; 
    private $log_message ; 
    private $log_level ; 
    private $log_mail_list ; 
    private $alert_level ;
    
    private function init_class(){
        $this->log_prefix = 'log' ; 
        $this->log_directory = '/';
        $this->log_message = 'Emergency!!! System not executeable';
        $this->log_level = SELF::MESSAGE_LEVEL_DEBUG ;
        $this->alert_level = SELF::MESSAGE_LEVEL_WARNING ;
        $this->mail_list = array('franktan98@yahoo.com');
    }

    private function define_message_level($source_level){
        $source_level = strtolower($source_level);
        switch ($source_level){
            case 'emergency' : 
                $this->log_level = SELF::MESSAGE_LEVEL_EMERGENCY ;
                break ; 
            case 'alert' : 
                $this->log_level = SELF::MESSAGE_LEVEL_ALERT ;
                break ; 
            case 'critical' : 
                $this->log_level = SELF::MESSAGE_LEVEL_CRITICAL;
                break ; 
            case 'error' : 
                $this->log_level = SELF::MESSAGE_LEVEL_ERROR ;
                break ; 
            case 'warning' : 
                $this->log_level = SELF::MESSAGE_LEVEL_WARNING;
                break ; 
            case 'notice' : 
                $this->log_level = SELF::MESSAGE_LEVEL_NOTICE ;
                break ; 
            case 'information' : 
                $this->log_level = SELF::MESSAGE_LEVEL_INFORMATION ;
                break ; 
            default :
                $this->log_level = SELF::MESSAGE_LEVEL_DEBUG ;
                break ; 
        }
    }

    private function log_to_system($source_message){
        if ($this->log_level <= SELF::MESSAGE_LEVEL_ERROR){
            error_log($source_message , 0);
        }
    }
    
    private function log_to_file($source_message){
        if ($this->log_level  <= $this->alert_level ){
            error_log($source_message , 3, $this->log_directory .$this->log_prefix.''.date('Y-m-d').'.log');
        }
    }
    
    private function log_to_email($source_message){
        if ( ($this->log_level <= SELF::MESSAGE_LEVEL_NOTICE)
                AND ( $this->log_level  <= $this->alert_level )) {
            error_log($source_message , 1,"franktan98@yahoo.com");    
        }
    }
    
    public function __construct() {
        $this->init_class();
    }
    
    public function set_log_file_prefix($source_prefix){
        $this->log_prefix = $source_prefix ; 
    }
    
    public function set_message($source_message){
        $this->log_message = $source_message ; 
    }

    public function set_mail_list($source_mail_list){
        $this->log_message = $source_mail_list ; 
    }
    
    public function set_alert_level($source_level){
        $this->alert_level = $source_level ; 
    }
    
    public function get_alert_level(){
        return $this->alert_level ; 
    }
    
    public function set_log_environment($source_alert_level,$source_directory,$source_prefix,$source_mail_list){
        $this->alert_level = $source_alert_level ; 
        $this->log_directory = $source_directory ;
        $this->log_prefix = $source_prefix ; 
        $this->log_mail_list = $source_mail_list;
    }

    public function log_me($source_level , $source_message ){
        $this->define_message_level($source_level);
        
        $log_date_time = '['.gmdate(DATE_RFC822).']'; // get GMT date time, easy for debuging.
        $message_level = '['.$source_level .']' ; 
            
        $this->log_to_system( $message_level  .'-'. $source_message);
        
        $source_message = $log_date_time . ' ' . $message_level . ':' .$source_message . "\r\n" ; 
        $this->log_to_file( $message_level  .'-'. $source_message);
        //$this->log_to_email( $message_level  .'-'. $source_message);
    }
}
