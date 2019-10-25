<?php
    /**
     * Front page of the demo.
     *
     * See README for details.
     */

    // breaks php 5
    //declare(strict_types=1);

    namespace JanMinar\CodingChallenge;

    require_once "autoloader.php";

    $logger = new FileLogger();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Jan Minar - Coding Challenge - Reciteme.com - 2019-10-24</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script-->
    <style>
    </style>
</head>
<body>
<!--h1>Shapes</h1-->
<section id="shapes">
    <div class="col-lg-4 shape" data-shape="circle">
        click me
    </div>
    <div class="col-lg-4 shape" data-shape="square">
        or tap me
    </div>
    <div class="col-lg-4 shape" data-shape="triangle">
        or me
    </div>
</section>
<section id="log">
 <!--h1>Live log</h1-->
 <pre id="logText">
 </pre>
</section>
</body>
<script src="script.js" data-log-path="<?php echo FileLogger::LOG_PATH; ?>"></script>
<?php
    switch($_GET["shape"]) {
        case "triangle": // red
            $logger->error("CODE RED, I guess this is a Bermuda triangle");
            break;
        case "square": // orange
            $logger->error("Code amber, do not be a square");
            break;
        case "circle": // green
            $fortuneCookieMessage = shell_exec("/usr/games/fortune -n 80"); // select from fortune cookies no longer than 80 characters

            // Make the cookie fit nicely on one line
            $fortuneCookieMessage = str_replace(array("\r\n", "\r", "\n"), " ", $fortuneCookieMessage);
            $fortuneCookieMessage = preg_replace("/(\t| )+/", " ", $fortuneCookieMessage);
            $fortuneCookieMessage = preg_replace("/^ | $/", "", $fortuneCookieMessage);

            $logger->log($fortuneCookieMessage);
            break;
        default:
            $logger->log("page loaded");
            break;
    }
?>
// vim: sts=4:ts=8:sw=4
