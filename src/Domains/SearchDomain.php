<?php

namespace Src\Domains;

use Src\Models\MovieCollectionInterface;
use Src\Services\SearchInterface;

class SearchDomain implements DomainInterface
{
    private $searchService;

    public function __construct(SearchInterface $searchService)
    {
        $this->searchService = $searchService;
    }

    public function search(?string $query): MovieCollectionInterface
    {
        return $this->searchService->search($query);
    }
}