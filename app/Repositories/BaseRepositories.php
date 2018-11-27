<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.11.18
 * Time: 10:43
 */

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

class BaseRepositories
{
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data) : bool
    {
        return $this->model->update($data);
    }

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all($columns = ['*'], string $orderBy = 'id', string $sortBy = 'asc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param  $id
     * @return mixed
     */
    public function findOneOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param array $key
     * @param null $value
     * @return mixed
     */
    public function findBy($key, $value = null)
    {
        return $this->model->where($key, '=', $value)->get();
    }

    /**
     * @param $key
     * @param null $value
     * @return mixed
     */
    public function findOneBy($key, $value = null)
    {
        return $this->model->where($key, '=', $value)->first();
    }

    /**
     * @param $key
     * @param null $value
     * @return mixed
     */
    public function findOneByOrFail($key, $value = null)
    {
        return $this->model->where($key, '=', $value)->firstOrFail();
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function delete() : bool
    {
        return $this->model->delete();
    }


}