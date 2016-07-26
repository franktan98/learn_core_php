<?php
namespace SimpleLibrary;
defined('SAFE_CALL') OR exit('No direct script access allowed');
/**
 * this file develop by core php, as my personal php coding skill 
 * test on understanding, reference, and also a sample.
 * try to keep good pratice
 */

/**
 * Description of Simple_Log
 *  
 * this is simple log library
 * 
 * reminder 
 * simple log system to enable mail sending please add mailling setting
 * into php.ini file
 * 
 * @author QQtan(franktan98@yahoo.com)
 * @since version 0.0.1
 * 
 * @todo complite the email log sending function
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
    
    /**
     * initiliaze of the class
     * set to default setting ready to use mode
     */
    private function init_class(){
        $this->log_prefix = 'log' ; 
        $this->log_directory = '/';
        $this->log_message = 'Emergency!!! System not executeable';
        $this->log_level = SELF::MESSAGE_LEVEL_DEBUG ;
        $this->alert_level = SELF::MESSAGE_LEVEL_WARNING ;
        $this->mail_list = array('franktan98@yahoo.com');
    }

    /**
     * define message level with the string given
     * 
     * @param type $source_level message level
     */
    private function define_message_level($source_level){
        switch (strtolower($source_level)){
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

    /**
     * log to the system log file
     * 
     * @param type $source_message message send to log
     */
    private function log_to_system($source_message){
        if ($this->log_level <= SELF::MESSAGE_LEVEL_ERROR){
            error_log($source_message , 0);
        }
    }
    
    /**
     * log to the file we define directory and also file with prefix name 
     * and follow by date of the log record.
     * 
     * @param type $source_message message send to log file
     */
    private function log_to_file($source_message){
        if ($this->log_level  <= $this->alert_level ){
            error_log($source_message , 3, 
                    $this->log_directory .$this->log_prefix.''.date('Y-m-d').'.log');
        }
    }
    /**
     * will send message via email if the level is more then alert level we setting 
     * or higher then NOTICE level.
     * 
     * @param type $source_message message to send via email
     */
    private function log_to_email($source_message){
        if ( ($this->log_level <= SELF::MESSAGE_LEVEL_NOTICE)
                AND ( $this->log_level  <= $this->alert_level )) {
            // this function not ready yet 
            //error_log($source_message , 1,"franktan98@yahoo.com");    
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
    
    /**
     * setting log message environment
     * 
     * @param type $source_alert_level alert level
     * @param type $source_directory directory to store log
     * @param type $source_prefix prefix of log
     * @param type $source_mail_list mailing list to send when log request
     */
    public function set_log_environment($source_alert_level,$source_directory,$source_prefix,$source_mail_list){
        $this->alert_level = $source_alert_level ; 
        $this->log_directory = $source_directory ;
        $this->log_prefix = $source_prefix ; 
        $this->log_mail_list = $source_mail_list;
    }

    /**
     * will deside to log into system log file, define log file or sending via email
     * depand on the source level provide
     * 
     * @param string $source_level the level of this message e.g.:'debug','infor','notice','warning','error','critical','emegency' 
     * @param string $source_message 'message send to log file' ; 
     */
    public function log_me($source_level , $source_message ){
        $this->define_message_level($source_level);
        
        $log_date_time = '['.gmdate(DATE_RFC822).']'; // get GMT date time, easy for debuging.
        $message_level = '['.$source_level .']' ; 
            
        $this->log_to_system( $message_level  .'-'. $source_message);
        
        $source_message = $log_date_time . ' ' . $message_level . ':' .$source_message . "\r\n" ; 
        $this->log_to_file( $message_level  .'-'. $source_message);
        $this->log_to_email( $message_level  .'-'. $source_message);
    }
}
