<?php
/**
 * Defines the Logging trait
 */

namespace JanMinar\CodingChallenge;

trait Logging {

  public function warn($message) {
    $this->log($message, self::LOG_WARNING);
  }

  public function error($message) {
    $this->log($message, self::LOG_ERR);
  }

}
