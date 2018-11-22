<?php

namespace App\Services\Container;

/**
 * Interface ContainerInterface
 * @package App\Services\Container
 */
interface ContainerInterface
{
    /**
     * @param string $classname
     * @return mixed
     */
    public function build(string $classname);
}
