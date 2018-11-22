<?php

namespace App\Services\ConfigUploader;

/**
 * Class LaravelConfigUploader
 * @package App\Services\ConfigUploader
 */
final class LaravelConfigUploader implements ConfigUploaderInterface
{
    /**
     * @param string $key
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getConfigs(string $key)
    {
        return config($key);
    }
}
