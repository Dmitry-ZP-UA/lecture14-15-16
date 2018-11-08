<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 08.11.18
 * Time: 13:04
 */

namespace App\Services\Filters\Contract;


interface CompositeInterface
{
    public function addFilter(FilterInterface $filter);
}
