<?php

$class_file_paths=array('../classes/','../classes/Exceptions/','../Controllers/','../Models/');
spl_autoload_register(function($className) use($class_file_paths) {
  
    foreach($class_file_paths as $paths){
        
         if(file_exists($paths.''.$className.'.php'))
        {
            require_once $paths.''.$className.'.php';

         }
    
    }
});

?>