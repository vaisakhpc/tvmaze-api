<?php

namespace Src\Services;

use Src\Models\MovieCollectionInterface;

interface SearchInterface
{
    public function search(?string $query): MovieCollectionInterface;
}