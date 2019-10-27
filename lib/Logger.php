<?php
/**
 * Defines the Logger trait
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
 * Defines the Logger trait
 *
 * @category ToolsAndUtilities
 * @package  CodingChallenge
 * @author   Jan Minar <rdancer@rdancer.org>
 * @license  https://github.com/rdancer/php-logger-module-coding-challenge/blob/master/LICENSE MIT
 * @link     https://www.flatwalls.co.uk/php-logger-module-coding-challenge
 */
trait Logger /* implements Logging */
{
    /**
     * Do the actual logging -- to be implemented by the using class
     *
     * @param string $message  The message we want to log -- this is a freeform string
     * @param string $severity one of "warn", "error", or "info"; use the LOG_* constants
     *
     * @return void
     */
    abstract public function log($message, $severity) : void;

    /**
     * Convenience wrapper for $this->log(), setting $severity to "warn"
     *
     * @param string $message The message we want to log -- this is a freeform string
     *
     * @return void
     */
    public function warn($message) : void
    {
        $this->log($message, self::LOG_WARNING);
    }

    /**
     * Convenience wrapper for $this->log(), setting $severity to "error"
     *
     * @param string $message The message we want to log -- this is a freeform string
     *
     * @return void
     */
    public function error($message) : void
    {
        $this->log($message, self::LOG_ERR);
    }
}

// vim: sts=4:ts=8:sw=4
