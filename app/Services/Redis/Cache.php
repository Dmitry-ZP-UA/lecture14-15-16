<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 20.11.18
 * Time: 15:46
 */

namespace App\Services\Redis;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redis;


class Cache
{

    /**
     * @param string $param
     * @return null
     */
    public function getCache($param) :Collection
    {
        $result = json_decode(Redis::get($param), true);

        return collect($result);

    }

    /**
     * @param $param
     * @param $result
     */
    public function setCache($param, Collection $collect)
    {
        $result = json_encode($collect);

        Redis::set($param, $result);
        Redis::expire($param, 1000);
    }


}
