<?php
/**
 * Front page of the demo.
 *
 * See README for details.
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

require_once "autoloader.php";

$logger = new FileLogger();

switch ($_GET["shape"]) {
    case "triangle": // red
        $logger->error("CODE RED, I guess this is a Bermuda triangle");
        break;
    case "square": // orange
        $logger->warn("Orange you glad it's hip to be square?");
        break;
    case "circle": // green
        $fortuneCookieMessage = getFortuneCookie();
        $logger->log($fortuneCookieMessage);
        break;
    default:
        $logger->log("page loaded");
        break;
}

/**
 * Select from fortune cookies no longer than $maxLength characters
 *
 * @param int $maxLength maximum length of the cookie, [1..]
 *
 * @return string Cookie as a single line of text
 */
function getFortuneCookie($maxLength = 80): string
{
    $maxLength *= 1; // sanitize

    if ($maxLength < 1) {
        return null;
    }

    $s = shell_exec("/usr/games/fortune -n" . /* already sanitized, but what the heck */ escapeshellarg($maxLength));

    // Make the cookie fit nicely on one line
    $s = str_replace(array("\r\n", "\r", "\n"), " ", $s);
    $s = preg_replace("/(\t| )+/", " ", $s);
    $s = preg_replace("/^ | $/", "", $s);

    return $s;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Jan Minar - Coding Challenge - 2019-10-24</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section id="shapes">
    <h1>Shapes</h1>
    <div class="shape" data-shape="circle">
        click me
    </div>
    <div class="shape" data-shape="square">
        or tap me
    </div>
    <div class="shape" data-shape="triangle">
        or me
    </div>
</section>
<section id="log">
    <h1>Live log</h1>
    <pre id="logText">
        <!--?php echo htmlspecialchars(file_get_contents(FileLogger::LOG_PATH)); ?-->
    </pre>
</section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="script.js" data-log-path="<?php echo FileLogger::LOG_PATH; ?>"></script>
<!-- vim: sts=4:ts=8:sw=4
  -->
