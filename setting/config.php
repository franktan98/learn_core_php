<?php
/*
*--------------------------------------------------------------------------
* Pre-load setting define value
*--------------------------------------------------------------------------
*
* Here is where you can define all of the preset value for an application.
*
*/
    // Environment setting 
    defined('SAFE_CALL')  OR define('SAFE_CALL', TRUE );
    //defined('DEFAULT_DEBUG_LEVEL')  OR define('DEFAULT_DEBUG_LEVEL', 'Simple_Log::MESSAGE_LEVEL_ERROR');
    defined('DEFAULT_DEBUG_LEVEL')  OR define('DEFAULT_DEBUG_LEVEL', 7);
    defined('DEBUG_LEVEL')  OR define('DEBUG_LEVEL', 'development');
    //defined('DEBUG_LEVEL')  OR define('DEBUG_LEVEL', 'testing');
    //defined('DEBUG_LEVEL')  OR define('DEBUG_LEVEL', 'profiling');
    //defined('DEBUG_LEVEL')  OR define('DEBUG_LEVEL', 'live');

    // System Setting
    defined('SYSTEM_NAME')  OR define('SYSTEM_NAME', 'SimpleLite');
    
    //System Directory and path setting
    defined('SYSTEM_BASE')  OR define('SYSTEM_BASE', 'learn_php');
    defined('LOG_DIR')  OR define('LOG_DIR', '../log/');
    defined('LIBRARY_DIR')  OR define('LIBRARY_DIR', 'library/');
    defined('CONTROLLERS_DIR')  OR define('CONTROLLERS_DIR', 'public/controllers/');
    date_default_timezone_set('Asia/Kuala_Lumpur');
    
    // LOG FILE SETTING
    defined('LOG_NAME')  OR define('LOG_NAME', 'log');
    
    // DATABASE SETTING 
    defined('DATABASE_SYSTEM') OR define('DATABASE_SYSTEM','mysql');
    defined('DATABASE_HOST') OR define('DATABASE_HOST','localhost');
    defined('DATABASE_PORT') OR define('DATABASE_PORT','3306');
    defined('DATABASE_NAME') OR define('DATABASE_NAME','gsap');
    defined('DATABASE_USER') OR define('DATABASE_USER','aaaa');
    defined('DATABASE_PASSWORD') OR define('DATABASE_PASSWORD','aaaa');
/*    
    defined('DEFAULT_DATABASE') OR define('DEFAULT_DATABASE'
            ,array(
                'database_system'=>'mysql',
                'hostname'=>'localhost',
                'port'=>3306,
                'database_name'=>'gsap',
                'database_user'=>'aaaa',
                'database_password'=>'aaaa'
                ));
*/    
    // Default function Caller
    defined('ROUTER_LIST')  OR define('ROUTER_LIST', '../setting/RouteList.xml');
    defined('DEFAULT_CONTROLLER')  OR define('DEFAULT_FUNCTION', 'hello');
    defined('DEFAULT_FUNCTION')  OR define('DEFAULT_FUNCTION', 'index');
?>
