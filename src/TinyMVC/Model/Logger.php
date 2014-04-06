<?php
namespace TinyMVC\Model;

use Exception;

class Logger {
    
    /**
     * @var string
     */
    const UNCAUGHT_EXCEPTION="UNCAUGHT_EXCEPTION";
    
    
    
    /**
     * @var string
     */
    const FATAL_EXCEPTION="FATAL_EXCEPTION";
    
    
    
    /**
     * @param string $message
     * @param string $error_type
     * 
     * @return void
     */
    public static function logException($error_type, Exception $e = null) {
        if ($e===null) Logger::logMessage("No Exception provided to log");
        switch ($error_type) {
            case Logger::UNCAUGHT_EXCEPTION:
                Logger::logMessage('Uncaught Exception: ' . $e->getMessage() . ' Code: ' . $e->getCode() . ' File: ' . $e->getFile() . ' Line: ' . $e->getLine());
                break;
           
            case Logger::FATAL_EXCEPTION:
                Logger::logMessage('Fatal Error: ' . $e->getMessage() . ' Code: ' . $e->getCode() . ' File: ' . $e->getFile() . ' Line: ' . $e->getLine());
                break;
            default:
                Logger::logMessage("No type matched this exception: " . $e->getMessage() . ' Code: ' . $e->getCode() . ' File: ' . $e->getFile() . ' Line: ' . $e->getLine());
        }
        
    }
    
    
    
    /**
     * @param string $message
     * 
     * @return void
     */
    public static function logMessage($message) {
        error_log(date('D M j G:i:s T Y') . ' - ' . $message . " \n", 3, 'log/app_errors.log');
    }
    
}