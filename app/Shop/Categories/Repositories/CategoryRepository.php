<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.11.18
 * Time: 10:24
 */

namespace App\Shop\Categories\Repositories;


use App\Repositories\BaseRepositories;
use App\Services\Redis\Cache;
use App\Shop\Categories\Category;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepositories implements CategoryRepositoryInterface
{
    /**
     * @var Cache
     */
    private $redisCache;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category, Cache $redis)
    {
        $this->redisCache = $redis;

        parent::__construct($category);
        $this->model = $category;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return Collection
     */
    public function listCategories(string $order = 'id', string $sort = 'desc', $except = [])
    {
        if($categories = $this->redisCache->getCache('categories')){
            return $categories;
        }
        $categories = $this->model->orderBy($order, $sort)->get()->except($except);
        $this->redisCache->setCache('categories',$categories);

        return $categories;
    }

    /**
     * @return mixed
     */
    public function parentCategories()
    {
        if($parentCategories = $this->redisCache->getCache('parentCategories')) {
            return $parentCategories;
        }
        $parentCategories = $this->model->where('parent_id', null)->get();

        $this->redisCache->setCache('parentCategories',$parentCategories);

        return $parentCategories;
    }

    public function createCategory(array $params): Category
    {
        // TODO: Implement createCategory() method.
    }

    public function findCategoryById(int $id): Category
    {
        // TODO: Implement findCategoryById() method.
    }

    public function findProducts(): Collection
    {
        // TODO: Implement findProducts() method.
    }

    public function findCategoryBySlug(string $slug): Category
    {
        return $this->model->where('slug', $slug)->first();
    }

}