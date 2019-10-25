<?php
/**
 * Implements the Logger trait.
 *
 * Logs are appended to LOG_PATH, which is created if it doesn't exist.
 */

declare(strict_types=1);

namespace JanMinar\CodingChallenge;

class FileLogger implements Logging {

  use Logger;

  const LOG_PATH = "log/demo.log"; // hard-coded

  private $logFile = null;

  /**
   *
   * Open the log file in append mode, attempt to create the file anew if it 
   * doesn't exist.
   *
   * Note: Concurrent access is not dealt with, but since we append whole 
   * lines, one at a time, this should not be a problem on Linux.
   */
  function __construct() {
    $this->logFile = fopen(self::LOG_PATH, "a") or die("cannot open " . self::LOG_PATH);
  }
  function __destruct() {
    fclose($this->logFile);
  }

  public function log($message, $severity = self::LOG_INFO) {
    $isoTime = (new \DateTime())->format(\DateTime::ATOM);

    $ip = $_SERVER['REMOTE_ADDR'];

    $referer =  $_SERVER['HTTP_REFERER'];
    if ($referer == "")
      $referer = "-";

    $shape = htmlspecialchars($_GET["shape"]);
    if ($shape == "")
      $shape = "-";
    else
      $shape = "\"" . $shape . "\"";

    fwrite($this->logFile, "[" . $severity . "] " . $isoTime . " " . $ip . " " . $shape . " " . $referer . " " . $message . PHP_EOL);
  }

}

