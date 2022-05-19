<?php

namespace Src\Services;

interface MapperInterface
{
    public function mapSuccess(array $response): array;

    public function mapFailure(int $code, string $message): array;
}