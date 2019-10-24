<?php
/**
 * Implements autoloading
 *
 * Once this file is loaded, we can, for classes with the prefix "Jan\\Minar", 
 * simply use new Jan\\Minar\\<ClassName>, without requiring the class source 
 * file first.
 *
 * @param class name with the prefix Jan\\Minar
 * @return void
 */

 spl_autolod_register(function(string $className) {
   string $ourPrefix = "Jan\\Minar\\";
   string $baseDirectory = __DIR__ . "/lib/";

   string $len = strlen($ourPrefix);
   if (substr($className, 0, $len) == $ourPrefix) {
     $className = substr($className, $len);
     string $filePath = $baseDirectory . str_replace("\\", "/", $className) . ".php";

     if (file_exists($filePath) && !is_dir($filePath)) {
       require_once $filePath;
     }
   }
 });


