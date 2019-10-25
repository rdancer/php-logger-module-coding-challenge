<?php
/**
 * Implements the Logger trait with loggin line-by-line to a normal file on the file system.
 *
 * The file format is similar to the Apache `access.log`, with SPACE-separated entries for the following fixed columns:
 *
 *     [severity] timestamp source_IP_address "circle|triangle|square" referrer
 * 
 * followed by an optional freeform message (which may contain any characters, including SPACE).
 *
 * @category ToolsAndUtilities
 * @package  CodingChallenge
 * @author   Jan Minar <rdancer@rdancer.org>
 * @license  https://github.com/rdancer/php-logger-module-coding-challenge/blob/master/LICENSE MIT
 * @link     https://www.flatwalls.co.uk/php-logger-module-coding-challenge
 */

// breaks php 5
//declare(strict_types=1);

namespace JanMinar\CodingChallenge;

/**
 * Logs are appended to LOG_PATH, which is created if it doesn't exist.
 *
 * @category ToolsAndUtilities
 * @package  CodingChallenge
 * @author   Jan Minar <rdancer@rdancer.org>
 * @license  https://github.com/rdancer/php-logger-module-coding-challenge/blob/master/LICENSE MIT
 * @link     https://www.flatwalls.co.uk/php-logger-module-coding-challenge
 */
class FileLogger implements Logging
{
    use Logger;

    const LOG_PATH = "log/janminar-demo.log"; // hard-coded

    private $__logFile = null;

    /**
     * Open the log file in append mode, attempt to create the file anew if it 
     * doesn't exist.
     *
     * Note: Concurrent access is not dealt with, but since we append whole 
     * lines, one at a time, this should not be a problem on Linux.
     */
    function __construct() 
    {
        $this->__logFile = fopen(self::LOG_PATH, "a") or die("cannot open " . self::LOG_PATH);
    }
    /**
     * Close the log file.
     *
     * @return void
     */
    function __destruct() 
    {
        fclose($this->__logFile);
    }

    /**
     * Append a log message, tagged with severity, to the log file.
     *
     * @param string $message  The message we want to log -- this is a freeform string
     * @param string $severity one of "warn", "error", or "info"; use the LOG_* constants
     *
     * @return void
     */
    public function log($message, $severity = self::LOG_INFO) : void
    {
        $isoTime = (new \DateTime())->format(\DateTime::ATOM);

        $ip = $_SERVER['REMOTE_ADDR'];

        $referer =  $_SERVER['HTTP_REFERER'];
        if ($referer == "") {
            $referer = "-";
        }

        $shape = htmlspecialchars($_GET["shape"]);
        if ($shape == "") {
            $shape = "-";
        } else {
            $shape = "\"" . $shape . "\"";
        }

        fwrite($this->__logFile, "[" . $severity . "] " . $isoTime . " " . $ip . " " . $shape . " " . $referer . " " . $message . PHP_EOL);
    }
}

// vim: sts=4:ts=8:sw=4
