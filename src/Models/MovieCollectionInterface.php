<?php

namespace Src\Models;

interface MovieCollectionInterface
{
    public function getData():? array;

    public function add(array $movie);
}