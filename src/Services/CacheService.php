<?php

namespace Src\Services;

use Illuminate\Support\Facades\Cache;

class CacheService implements CacheInterface
{
    public function get(string $key): mixed
    {
        return Cache::get($key);
    }

    public function set(string $key, string $value)
    {
        Cache::put($key, $value);
    }
}