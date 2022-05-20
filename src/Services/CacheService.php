<?php

namespace Src\Services;

use Illuminate\Support\Facades\Cache;

class CacheService implements CacheInterface
{
    /**
     * get method
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed
    {
        return Cache::get($key);
    }

    /**
     * set method
     * @param string $key
     * @param string $value
     */
    public function set(string $key, string $value)
    {
        Cache::put($key, $value);
    }
}