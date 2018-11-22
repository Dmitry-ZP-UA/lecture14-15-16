<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 20.11.18
 * Time: 14:45
 */

namespace App\Services\Searcher;
use Elasticsearch\Client;



class Elastic
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Elastic constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $parameters
     * @return array
     */
    public function index(array $parameters)
    {
        return $this->client->index($parameters);
    }

    /**
     * @param array $parameters
     * @return array
     */
    public function delete(array $parameters)
    {
        return $this->client->delete($parameters);
    }

    /**
     * @param array $parameters
     * @return array
     */
    public function search(array $parameters)
    {
        return $this->client->search($parameters);
    }
}
