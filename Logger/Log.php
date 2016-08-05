<?php
require_once '/src/Auth.php';
class Log
{
    public $filename;
    public $handle;

    public function __construct($prefix = 'log')
    {
        date_default_timezone_set('America/Chicago');
        $this->filename = $prefix . '-' . date('Y-d-m') . '.log';
        $this->handle = fopen($this->filename, 'a');


    }

    public function logMessage($logLevel, $message)

    {
        date_default_timezone_set('America/Chicago');
        $date = date('Y-d-m');
        $time = date('H:i:s');
        fwrite($this->handle,"$date $time [$logLevel] $message\n");

    }

    public function logInfo($message){
        $this->logMessage('Info', $message);
    }

    public function logError($message) {
        $this->logMessage('Error', $message);
    }

    public function __destruct()
    {
        fclose($this->handle);
    }
}