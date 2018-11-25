<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 20.11.18
 * Time: 15:46
 */

namespace App\Services\Redis;

use Illuminate\Support\Facades\Redis;


class Cache
{

    /**
     * @param string $param
     * @return mixed
     */
    public function getCache(string $param)
    {
        $data = Redis::get($param);
        $result = json_decode($data);

        return $result;

    }

    /**
     * @param $key
     * @param $value
     */
    public function setCache(string $key, $value)
    {
        Redis::set($key, $value);
        Redis::expire($key, 1000);
    }


}
