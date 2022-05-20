<?php
namespace Tests\Src\Domain;

use Laravel\Lumen\Testing\TestCase as BaseTestCase;
use Src\Services\LoggerService;
use Src\Services\ClientService;
use Src\Services\CacheService;
use Src\Services\SearchService;
use GuzzleHttp\Client;
use Src\Models\MovieCollection;
use Src\Domains\SearchDomain;

class SearchDomainTest extends BaseTestCase
{
    public function testSearchMethod()
    {
        $logger = new LoggerService;
        $client = new ClientService(new Client(), $logger);
        $movieCollection = new MovieCollection;
        $cache = new CacheService;
        $service = new SearchService($client, $movieCollection, $cache);
        $searchDomain = new SearchDomain($service);
        $this->assertInstanceOf(MovieCollection::class, $searchDomain->search('deadwood'));
        $this->assertNotEmpty($searchDomain->search('deadwood')->getData());
    }

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__ . '/../../../bootstrap/app.php';
    }
}