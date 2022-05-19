<?php

namespace Src\Services;

interface ClientInterface
{
    public function get(?string $query);
}