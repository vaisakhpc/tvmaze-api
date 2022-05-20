<?php

namespace Src\Services;

class MapperService implements MapperInterface
{
    /**
     * map Success response
     * @param array $response
     * @return array
     */
    public function mapSuccess(array $response): array
    {
        $response = [
            'error' => 'false',
            'code' => 200,
            'data' => $response,
        ];
        return $response;
    }

    /**
     * map Failure response
     * @param int $code
     * @param string $message
     * @return array
     */
    public function mapFailure(int $code, string $message): array
    {
        $response = [
            'error' => 'true',
            'code' => $code,
            'message' => $message,
        ];
        return $response;
    }
}