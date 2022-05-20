<?php
namespace Src\Services;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LoggerService implements LoggerInterface
{
    private string $path;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->path = storage_path() . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR;
    }

    /**
     * log method
     * @param string $message
     * @param string $filename
     * @param string $loggerName
     */
    public function log(string $message, string $filename, string $loggerName)
    {
        $log = new Logger($loggerName);
        $log->pushHandler(new StreamHandler($this->path . $filename, Logger::INFO));
        $log->info($message);
    }
}