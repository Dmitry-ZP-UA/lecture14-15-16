<?php

namespace App\Services\ConfigUploader;

/**
 * Interface ConfigUploaderInterface
 * @package App\Services\ConfigUploader
 */
interface ConfigUploaderInterface
{
    /**
     * @param string $key
     * @return mixed
     */
    public function getConfigs(string $key);
}