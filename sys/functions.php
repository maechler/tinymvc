<?php
namespace MyMVC\Globals;

//start standard autoloading
call_user_func(function() {
    set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
    spl_autoload_extensions(".php");
    spl_autoload_register();
});

