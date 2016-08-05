<?php

function logMessage($logLevel, $message)

{
    date_default_timezone_set('America/Chicago');
    $date = date('Y-d-m');
    $time = date('H:i:s');
    $filename = "LOG-$date.log";
    $handle = fopen($filename, 'a');
    fwrite($handle,"$date $time [$logLevel] $message\n");
    fclose($handle);

}
function logInfo($message){
    logMessage('Info', $message);
}

function logError($message) {
    logMessage('Error', $message);
}

logInfo("This is a test");
logError("This is an info message.");
