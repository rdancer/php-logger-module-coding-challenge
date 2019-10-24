<?php
/**
 * Implements autoloading
 *
 * Once this file is loaded, we can, for classes with the prefix "Jan\\Minar", 
 * simply use new Jan\\Minar\\<ClassName>, without requiring the class source 
 * file first.
 *
 * The files live in the ./lib subdirectory.
 *
 * @param class name with the prefix Jan\\Minar
 * @return void
 */

 spl_autoload_register(function($className) {
   $ourPrefix = "Jan\\Minar\\";
   $baseDirectory = __DIR__ . "/lib/";

   $len = strlen($ourPrefix);
   if (substr($className, 0, $len) == $ourPrefix) {
     $className = substr($className, $len);
     $filePath = $baseDirectory . str_replace("\\", "/", $className) . ".php";

     if (file_exists($filePath) && !is_dir($filePath)) {
       require_once $filePath;
     }
   }
 });