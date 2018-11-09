<?php

namespace App\Services\Container;

/**
 * Class Container
 * @package App\Services\Container
 */
final class Container implements ContainerInterface
{
    /**
     * @param string $classname
     * @return mixed
     */
    public function build(string $classname)
    {
        return resolve($classname);
    }
}
