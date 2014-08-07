<?php
namespace MyMVC\Globals;

//start standard autoloading
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_extensions(".php");
spl_autoload_register();

if ( APP_ENVIRONMENT_DEVELOPMENT ) {
    ini_set("display_errors", 1);
    error_reporting(E_ALL ^ E_NOTICE);
}
