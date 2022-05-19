<?php

namespace Src\Services;

use Src\Models\MovieCollectionInterface;

class SearchService implements SearchInterface
{
    private $clientService;

    private $movieCollection;

    private $cacheService;

    public function __construct(
        ClientInterface $clientService,
        MovieCollectionInterface $movieCollection,
        CacheInterface $cacheService
    ) {
        $this->clientService = $clientService;
        $this->movieCollection = $movieCollection;
        $this->cacheService = $cacheService;
    }

    public function search(?string $query): MovieCollectionInterface
    {
        if ($query) {
            if (!$response = unserialize($this->cacheService->get(md5($query)))) {
                $response = $this->clientService->get($query);
                $this->cacheService->set(md5($query), serialize($response));
            }
            foreach ($response as $entry) {
                if (stripos($entry['show']['name'], $query) !== false) {
                    $this->movieCollection->add($entry);
                }
            }
        }
        return $this->movieCollection;
    }
}