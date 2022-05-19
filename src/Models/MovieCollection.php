<?php

namespace Src\Models;

use Src\Models\MovieInterface;

class MovieCollection implements MovieCollectionInterface
{
    private array $data = [];

    /**
     * get data
     * @return array|null
     */
    public function getData():? array
    {
        $response = [];
        foreach ($this->data as $value) {
            $response[] = $value->getData();
        }
        return $response;
    }

    /**
     * add data
     * @param array $movie
     */
    public function add(array $movie)
    {
        $movieObj = new Movie(
            $movie['score'],
            $movie['show']['id'],
            $movie['show']['name'],
            $movie['show']['officialSite'],
            $movie['show']['rating']['average'],
        );
        $this->data[] = $movieObj;
    }
}