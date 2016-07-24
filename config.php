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
    defined('DEBUG_LEVEL')  OR define('DEBUG_LEVEL', 'develop');
    //defined('DEBUG_LEVEL')  OR define('DEBUG_LEVEL', 'testing');
    //defined('DEBUG_LEVEL')  OR define('DEBUG_LEVEL', 'profiling');
    //defined('DEBUG_LEVEL')  OR define('DEBUG_LEVEL', 'live');

    
    defined('SYSTEM_NAME')  OR define('SYSTEM_NAME', 'Simple Sample');
    
    defined('CURRENT_FILE')  OR define('CURRENT_FILE', '');
    
?>
