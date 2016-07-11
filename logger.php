<?php

function logMessage($logLevel, $message)

{
    date_default_timezone_set('America/Chicago');
    $date = date('Y-d-m');
    $time = date('g:i:s');
    $filename = "LOG-$date.log";
    $handle = fopen($filename, 'a');
    fwrite($handle,"$date $time [$logLevel] $message\n");
    fclose($handle);

}

logMessage("INFO", "This is a test");
logMessage("ERROR", "This is an info message.");
