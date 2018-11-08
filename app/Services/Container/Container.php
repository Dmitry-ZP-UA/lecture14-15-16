<?php

namespace App\Services\Container;

class Container
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
