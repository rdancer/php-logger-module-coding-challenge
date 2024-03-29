<?php
/**
 * Implements autoloading
 *
 * Once this file is loaded, we can, for classes with the prefix "Jan\\Minar",
 * simply use new JanMinar\\CodingChallenge\\<ClassName>, without requiring the
 * class source file first.
 *
 * The files live in the ./lib subdirectory.
 *
 * @param class name with the prefix JanMinar\\CodingChallenge
 *
 * @return void
 *
 * @category ToolsAndUtilities
 * @package  CodingChallenge
 * @author   Jan Minar <rdancer@rdancer.org>
 * @license  https://github.com/rdancer/php-logger-module-coding-challenge/blob/master/LICENSE MIT
 * @link     https://www.flatwalls.co.uk/php-logger-module-coding-challenge
 */

// breaks php 5
//declare(strict_types=1);

spl_autoload_register(
    function ($className) {
        $ourPrefix = "JanMinar\\CodingChallenge\\";
        $baseDirectory = __DIR__ . "/lib/";

        $len = strlen($ourPrefix);
        if (substr($className, 0, $len) == $ourPrefix) {
            $className = substr($className, $len);
            $filePath = $baseDirectory . str_replace("\\", "/", $className) . ".php";

            if (file_exists($filePath) && !is_dir($filePath)) {
                include_once $filePath;
            }
        }
    }
);
// vim: sts=4:ts=8:sw=4
