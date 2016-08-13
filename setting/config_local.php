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
    defined('DEFAULT_DEBUG_LEVEL')  OR define('DEFAULT_DEBUG_LEVEL', 4);
    defined('DEBUG_LEVEL')  OR define('DEBUG_LEVEL', 'development');
    //defined('DEBUG_LEVEL')  OR define('DEBUG_LEVEL', 'testing');
    //defined('DEBUG_LEVEL')  OR define('DEBUG_LEVEL', 'profiling');
    //defined('DEBUG_LEVEL')  OR define('DEBUG_LEVEL', 'live');

    // System Setting
    defined('SYSTEM_NAME')  OR define('SYSTEM_NAME', 'gsap report module');
    date_default_timezone_set('Asia/Kuala_Lumpur');
    
    // LOG FILE SETTING
    defined('LOG_DIR')  OR define('LOG_DIR', '../../agsap/log/');
    defined('LOG_NAME')  OR define('LOG_NAME', 'log');
    
    // DATABASE SETTING 
    defined('DATABASE_HOST')  OR define('DATABASE_HOST', 'localhost');
    defined('DATABASE_NAME')  OR define('DATABASE_NAME', 'gsap');
    defined('DATABASE_USER')  OR define('DATABASE_USER', 'aaaa');
    defined('DATABASE_PASSWORD')  OR define('DATABASE_PASSWORD', 'aaaa');
    
    // Default function Caller
    defined('DEFAULT_FUNCTION')  OR define('DEFAULT_FUNCTION', 'index');
    
    
?>