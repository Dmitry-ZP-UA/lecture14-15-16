<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 08.11.18
 * Time: 13:04
 */

namespace App\Services\Filters\Contract;


use Illuminate\Support\Collection;

interface FilterInterface
{
    public function filter(Collection $collection): Collection;

}
