<?php

namespace App\Database;

use Illuminate\Database\Connection as BaseConnection;
use Illuminate\Support\Collection;


class Connection extends BaseConnection
{
    /**
     * The database handler.
     *
     * @var Collection
     */
    protected $db;

    /**
     * Create a new database connection instance.
     *
     * @param  array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        // Select database
        $this->db = $this->selectDatabase($this->getConnection($config));

        $this->useDefaultPostProcessor();
//        $this->useDefaultSchemaGrammar();
//        $this->useDefaultQueryGrammar();
    }

    /**
     * Begin a fluent query against a database collection.
     *
     * @param  string $collection
     * @return Builder
     */
    public function collection($collection)
    {
        $query = new Builder($this, $this->getPostProcessor());
        return $query->from($collection);
    }

    /**
     * Begin a fluent query against a database collection.
     *
     * @param  string $table
     * @return Builder
     */
    public function table($table)
    {
        return $this->collection($table);
    }

    /**
     * Get connection.
     *
     * @param  array $config
     * @return array
     */
    protected function getConnection(array $config)
    {
        return $config['connections'][$config['default']];
    }

    /**
     * Create a new Collection connection.
     *
     * @param  array $config
     * @return Collection
     */
    protected function selectDatabase(array $config)
    {
        return new Collection(config($config['database']));
    }

    /**
     * Get a collection.
     *
     * @param  string $name
     * @return Collection
     */
    public function getCollection($name)
    {
        return $this->db->only($name)->values();
    }

    /**
     * Get the database object.
     *
     * @return Collection
     */
    public function getDB()
    {
        return $this->db;
    }

    /**
     * @inheritdoc
     */
    public function disconnect()
    {
        unset($this->db);
    }

    /**
     * @inheritdoc
     */
    public function getDriverName()
    {
        return 'collection';
    }

    /**
     * @inheritdoc
     */
    protected function getDefaultPostProcessor()
    {
        return new Query\Processor();
    }

    /**
     * Dynamically pass methods to the connection.
     *
     * @param  string $method
     * @param  array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->db, $method], $parameters);
    }
}

