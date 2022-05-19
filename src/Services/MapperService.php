<?php

namespace Src\Services;

class MapperService implements MapperInterface
{
    public function mapSuccess(array $response): array
    {
        $response = [
            'error' => 'false',
            'code' => 200,
            'data' => $response,
        ];
        return $response;
    }

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