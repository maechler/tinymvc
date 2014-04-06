<?php
namespace TinyMVC\Model;

use \Exception;

class Cache {
    
    /**
     * @var string
     */
    const CONFIG_FILE_NAME='config.php';
    
    
    
    /**
     * @return string
     */
    public static function getJSPath() {
        return 'Cached Js is about to come.';
    }
    
    
    
    /**
     * @return array
     */
    public static function getConfig() {
        try {
            return self::readConfig();
        } catch(Exception $e) {
            Logger::logException('', $e);
            
            return array();
        }
    }
    
    
    
    /**
     * @throws Exception
     * @return array
     */
    private static function readConfig($recursionCount = 1) {
        if ($recursionCount > 2) throw new Exception('Could not read Config.', 1392139526);
        
        if (file_exists(self::getConfigCacheFilePath())) {
            return file_get_contents(self::getConfigCacheFilePath());
        } else {
            self::generateConfigCache();
            return self::readConfig(++$recursionCount);
        }
    }
    
    
    
    /**
     * @throws Exception
     * @return void
     */
    private static function generateConfigCache() {
        $routesConfig = array();
        $moduleDirectories = glob(App::getSrcDir() . '*', GLOB_ONLYDIR);
        
        if (!is_array($moduleDirectories)) throw new Exception('Failed to read dir: ' . App::getSrcDir(), 1392139510);
       
        foreach ($moduleDirectories as $dir) {
            $configFile = $dir . '/config.php';
            if (file_exists($configFile)) {
                $includedConfig = include $configFile;
                if (is_array($includedConfig)) $routesConfig[] = $includedConfig;
            }
        }
        
        $mergedConfigs = call_user_func_array("array_replace_recursive", $routesConfig);
        
        var_dump($mergedConfigs);
        var_dump(var_export($mergedConfigs));
        
        file_put_contents(self::getConfigCacheFilePath(), "<?php \n\nreturn " . var_export($mergedConfigs, true) . ';');
        
    }
    
    
    
    /**
     * @return string 
     */
    private static function getConfigCacheFilePath() {
        return App::getCacheDir() . self::CONFIG_FILE_NAME;
    }
    
}