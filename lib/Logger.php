<?php
/**
 * Defines the Logger trait
 */

declare(strict_types=1);

namespace JanMinar\CodingChallenge;

trait Logger {

  public function warn($message) {
    $this->log($message, self::LOG_WARNING);
  }

  public function error($message) {
    $this->log($message, self::LOG_ERR);
  }

}
