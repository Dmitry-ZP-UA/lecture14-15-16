<?php

namespace App\Services\Searcher;

use App\Services\Redis\Cache;
use App\Shop\Products\Product;
use Illuminate\Support\Collection;

class ProductSearcher
{
    /**
     * @var Product
     */
    private $product;

    /**
     * @var \Illuminate\Foundation\Application|mixed
     */
    private $client;

    /**
     * @var
     */
    private $cache;

    /**
     * ProductSearcher constructor.
     * @param Product $product
     */
    public function __construct(Product $product, Cache $cache, Elastic $client)
    {
        $this->client = $client;
        $this->product = $product;
        $this->cache = $cache;
    }

    /**
     * @param string $param
     * @return mixed
     */
    public function search(string $param): Collection
    {
        if(($this->cache->getCache($param)->isNotEmpty())){
            return $this->cache->getCache($param);
        }

        $result = $this->elasticSearch($param);
        $this->cache->setCache($param, $result);

        return collect($result);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function elasticSearch($data)
    {
        $query = [
            'multi_match' => [
                'query' => $data,
                'fuzziness' => 'AUTO',
                'fields' => ['name', 'category'],
            ],
        ];

        $params = $this->getParams($query);

        $results = $this->client->search($params);
        $res = array();

        foreach ($results['hits']['hits'] as $value) {
            array_push($res, $value["_id"]);
        }

        return $this->product->whereIn('id', $res)->get();
    }

    /**
     * @return array
     */
    private function getParams($query)
    {
        return [
            'index' => 'shop',
            'type' => 'products',
            'body' => [
                'query' => $query
            ]
        ];
    }


}
