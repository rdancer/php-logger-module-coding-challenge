<?php
/**
 * Specifies the Logging interface
 */

// breaks php 5
//declare(strict_types=1);

namespace JanMinar\CodingChallenge;

interface Logging {

    const LOG_INFO = "info";
    const LOG_ERR = "error";
    const LOG_WARNING = "warning";

    public function log($message, $severity);
    public function warn($message);
    public function error($message);
}

// vim: sts=4:ts=8:sw=4
