<?php

namespace RedSquirrelStudio\LaravelBackpackImportOperation\Columns;

use RedSquirrelStudio\LaravelBackpackImportOperation\Interfaces\ImportColumnInterface;
class ImportColumn implements ImportColumnInterface
{
    protected string $data;
    protected array $config;

    /**
     * Instantiate with data from the spreadsheet column
     * @param string $data
     * @param array $config = []
     */
    public function __construct(string $data, array $config = [])
    {
        $this->data = $data;
        $this->config = $config;
    }

    /**
     * Return the data after processing
     * @return mixed
     */
    public function output(): mixed
    {
        return $this->data;
    }

    /**
     * @param string|null $key
     * @return mixed
     */
    public function getConfig(?string $key = null): mixed
    {
        if (is_null($key)){
            return $this->config;
        }
        if (isset($this->config[$key])){
            return $this->config[$key];
        }
        return null;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        $class = get_class($this);
        $class_parts = explode("\\", $class);
        return str_replace('Column', '', array_pop($class_parts));
    }
}
