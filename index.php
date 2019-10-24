<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jan Minar - Coding Challenge - Reciteme.com - 2019-10-24</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script-->
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
<hr>
</shapes>
<section id="log">
 <!--h1>Live log</h1-->
 <pre id="logText">
    <?php
      $ip = $_SERVER['REMOTE_ADDR'];

      $referer =  $_SERVER['HTTP_REFERER'];
      if ($referer == "")
	$referer = "-";

      $text = htmlspecialchars($_GET["shape"]);
      if ($text == "")
	$text = "-";
      else
	$text = "\"" . $text . "\"";

      $logFile = fopen("/tmp/access.log", "a") or die("cannot open access.log");
      fwrite($logFile, $ip . " " . $text . " " . $referer . "\n");
      fclose($logFile);
    ?>
 </pre>
</section>
</body>
<script src="script.js"></script>
