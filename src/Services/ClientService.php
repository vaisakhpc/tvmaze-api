<?php

namespace Src\Services;

use GuzzleHttp\Client;
use Src\Services\LoggerInterface;

class ClientService implements ClientInterface
{
    private $client;

    private $endpoint;

    private $logger;

    /**
     * Constructor
     * @param Client $client
     * @param LoggerInterface $logger
     */
    public function __construct(Client $client, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
        $this->endpoint = env('API_ENDPOINT');
    }

    /**
     * Get method
     * @param ?string $query
     * @return string
     */
    public function get(?string $query)
    {
        $data = [
            'query' => ['q' => $query],
        ];
        $request = $this->client->request('GET', $this->endpoint, $data);
        $response = $request->getBody()->getContents();
        $requestMessage = 'URL : ' . $this->endpoint . ', input : ' . json_encode($data) . PHP_EOL;
        $this->logger->log($requestMessage, 'third-party-api.log', 'api');
        $this->logger->log('Response => ' . $response, 'third-party-api.log', 'api');
        return json_decode($response, true);
    }

}