<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 20.11.18
 * Time: 15:46
 */

namespace App\Services\Redis;


use Illuminate\Support\Collection;
use Doctrine\Common\Cache\RedisCache;

class Cache
{

    /**
     * @param string $param
     * @return null
     */
    public function getCache($param)
    {
        return collect(Redis::get($param));
    }

    /**
     * @param $param
     * @param $result
     */
    public function setCache($param, $result)
    {
        Redis::set($param, $result);
        Redis::expire($param, 3600);
    }


}
