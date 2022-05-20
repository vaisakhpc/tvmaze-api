<?php
namespace src\Models;

use Throwable;
use Src\Services\MapperInterface;

class ExceptionMapper
{
    private $mapper;

    /**
     * Constructor
     * @param MapperInterface $mapper
     */
    public function __construct(MapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * map Exception method
     * @param Throwable $exception
     * @return array
     */
    public function mapException(Throwable $exception): array
    {
        $statusCode = method_exists($exception, 'getCode') ? $exception->getCode() : 500;
        if (env('APP_DEBUG') == true) {
            $msg = $exception->getMessage() ?
                    $exception->getMessage() .
                    $exception->getFile() .
                    $exception->getLine() :
                    'Error';
        } else {
            $msg = $exception->getMessage() ?: 'Error';
        }
        return $this->mapper->mapFailure($statusCode, $msg);
    }
}