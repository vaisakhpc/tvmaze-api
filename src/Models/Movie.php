<?php

namespace Src\Models;

class Movie implements MovieInterface
{
    /**
     * @var float
     */
    private float $score;

    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string|null
     */
    private ?string $officialSite;

    /**
     * @var string|null
     */
    private ?string $rating;

    public function __construct(
        float $score,
        int $id,
        string $name,
        ?string $officialSite,
        ?string $rating
    ) {
        $this->score = $score;
        $this->id = $id;
        $this->name = $name;
        $this->officialSite = $officialSite;
        $this->rating = $rating;
    }

    /**
     * get Data
     * @return array
     */
    public function getData():? array
    {
        return get_object_vars($this);
    }

    /**
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param float $score
     *
     * @return self
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getOfficialSite()
    {
        return $this->officialSite;
    }

    /**
     * @param string $officialSite
     *
     * @return self
     */
    public function setOfficialSite($officialSite)
    {
        $this->officialSite = $officialSite;

        return $this;
    }

    /**
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param string $rating
     *
     * @return self
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }
}