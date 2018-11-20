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
    public function __construct(Product $product, Cache $cache)
    {
        $this->client = app(Elastic::class);
        $this->product = $product;
        $this->cache = $cache;
    }

    /**
     * @param string $param
     * @return mixed
     */
    public function search(string $param): Collection
    {
        if($this->cache->getCache($param)){
            return $this->cache->getCache($param);
        }

        $result = $this->searchProductByName($param);
        $this->cache->setCache($param, collect($result));

        return collect($result);
       // return $this->elasticSearch($param);
    }

    /**
     * @param string $param
     * @return mixed
     */
    private function searchProductByName(string $param)
    {
        return $product = $this->product->where([
            ['name', 'LIKE', '%' . $param . '%']
        ])->with(['category'])->get();

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
        dd($results);

        return $results;

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
