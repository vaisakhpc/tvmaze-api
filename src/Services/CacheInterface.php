<?php

namespace Src\Services;

interface CacheInterface
{
    public function get(string $key): mixed;

    public function set(string $key, string $value);
}