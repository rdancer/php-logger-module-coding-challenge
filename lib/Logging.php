<?php
/**
 * Defines the Logging trait
 */

namespace Jan\Minar;

trait Logging {

  public function warn($message) {
    $this->log($message, self::LOG_WARNING);
  }

  public function error($message) {
    $this->log($message, self::LOG_ERR);
  }

}
