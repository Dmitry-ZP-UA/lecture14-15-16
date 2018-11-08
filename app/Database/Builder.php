<?php

namespace App\Database;

use App\Database\Query\Processor;
use App\Exceptions\NotImplementedException;
use Illuminate\Database\Query\Builder as BaseBuilder;
use Illuminate\Database\Query\Grammars\Grammar;
use Illuminate\Support\Collection;

class Builder extends BaseBuilder
{
    /**
     * The database collection.
     *
     * @var Collection
     */
    protected $collection;

    /**
     * @var string
     */
    protected $collectionName;

    /**
     * @var string
     */
    protected $databaseName;

    /**
     * Indicate if we are executing a pagination query.
     *
     * @var bool
     */
    public $paginating = false;

    /**
     * @inheritdoc
     */
    public function __construct(Connection $connection, Processor $processor)
    {
        // $this->grammar = new Grammar;
        $this->connection = $connection;
        $this->databaseName = $connection->getDatabaseName();
        $this->collection = $connection->getCollection($this->databaseName);
        $this->processor = $processor;
    }

    /**
     * @inheritdoc
     */
    public function find($id, $columns = [])
    {
        return $this->where('id', $id);
    }

    /**
     * @inheritdoc
     */
    public function get($columns = [])
    {
        return $this->getFresh($columns);
    }

    /**
     * Execute the query as a fresh "select" statement.
     *
     * @param  array $columns
     * @return array|static[]|Collection
     */
    public function getFresh($columns = [])
    {
        // If no columns have been specified for the select statement, we will set them
        // here to either the passed columns, or the standard default of retrieving
        // all of the columns on the table using the "wildcard" column character.
        if (is_null($this->columns)) {
            $this->columns = $columns;
        }

        // Drop all columns if * is present, MongoDB does not work this way.
        if (in_array('*', $this->columns)) {
            $this->columns = [];
        }

        // Compile wheres
        // $wheres = $this->compileWheres();

        $columns = [];

        // Execute query and get MongoCursor
        //$cursor = $this->collection->find($wheres, $options);


        $results = empty($columns)
            ? $this->collection
            : $this->collection->only($columns);

        $skip = $this->offset ?: 0;
        $limit = $this->limit ?: -1;
        if ($skip != 0 && $limit != -1) {
            $results = $results->splice($skip, $limit);
        }

        if ($this->orders) {
            $columnName = key($this->orders);
            $order = $this->orders[$columnName];
            $results = $order == 'asc'
                ? $results->sortBy($columnName)
                : $results->sortByDesc($columnName);
        }

        // Return results
        return $results;

    }

    /**
     * Generate the unique cache key for the current query.
     *
     * @return string
     */
    public function generateCacheKey()
    {
        $key = [
            'connection' => $this->collection->getDatabaseName(),
            'collection' => $this->collection->getCollectionName(),
            'wheres' => $this->wheres,
            'columns' => $this->columns,
            'orders' => $this->orders,
            'offset' => $this->offset,
            'limit' => $this->limit
        ];

        return md5(serialize(array_values($key)));
    }

    /**
     * @inheritdoc
     */
    public function orderBy($column, $direction = 'asc')
    {
        if (is_string($direction)) {
            $direction = (strtolower($direction) == 'asc' ? 1 : -1);
        }

        $this->orders = [$column => $direction];

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function forPage($page, $perPage = 15)
    {
        $this->paginating = true;

        return $this->skip(($page - 1) * $perPage)->take($perPage);
    }

    /**
     * @param array|\Closure|string $column
     * @param null $operator
     * @param null $value
     * @param string $boolean
     * @return Collection
     */
    public function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        $this->collection = $this->collection->where($column, $operator, $value);
        return $this->collection;
    }

    /**
     * @inheritdoc
     */
    public function insert(array $values)
    {
        throw new NotImplementedException();
    }

    /**
     * @inheritdoc
     */
    public function insertGetId(array $values, $sequence = null)
    {
        throw new NotImplementedException();
    }

    /**
     * @inheritdoc
     */
    public function update(array $values, array $options = [])
    {
        throw new NotImplementedException();
    }

    /**
     * @inheritdoc
     */
    public function increment($column, $amount = 1, array $extra = [], array $options = [])
    {
        throw new NotImplementedException();
    }

    /**
     * @inheritdoc
     */
    public function decrement($column, $amount = 1, array $extra = [], array $options = [])
    {
        throw new NotImplementedException();
    }

    /**
     * @inheritdoc
     */
    public function chunkById($count, callable $callback, $column = '_id', $alias = null)
    {
        throw new NotImplementedException();
    }

    /**
     * @inheritdoc
     */
    public function forPageAfterId($perPage = 15, $lastId = 0, $column = '_id')
    {
        throw new NotImplementedException();
    }

    /**
     * @inheritdoc
     */
    public function delete($id = null)
    {
        throw new NotImplementedException();
    }

    /**
     * @inheritdoc
     */
    public function from($collectionName)
    {
        if ($collectionName) {
            $this->collectionName = $collectionName;
            $this->collection = collect(...$this->connection->getCollection($collectionName));
        }

        return parent::from($collectionName);
    }

    /**
     * @inheritdoc
     */
    public function newQuery()
    {
        return new Builder($this->connection, $this->processor);
    }

    /**
     * @inheritdoc
     */
    public function __call($method, $parameters)
    {
        return $this->collection::__call($method, $parameters);
    }
}