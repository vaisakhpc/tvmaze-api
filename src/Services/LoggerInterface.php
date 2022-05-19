<?php

namespace Src\Services;

interface LoggerInterface
{
    public function log(string $message, string $filename, string $loggerName);
}