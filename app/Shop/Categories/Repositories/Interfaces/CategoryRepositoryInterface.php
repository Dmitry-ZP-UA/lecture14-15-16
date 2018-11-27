<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.11.18
 * Time: 10:23
 */

namespace App\Shop\Categories\Repositories\Interfaces;


use App\Shop\Categories\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function listCategories(string $order = 'id', string $sort = 'desc', $except = []);

    public function createCategory(array $params) : Category;

//    public function updateCategory(array $params) : Category;

    public function findCategoryById(int $id) : Category;

    /*public function deleteCategory() : bool;

    public function associateProduct(Product $product);

    public function syncProducts(array $params);

    public function detachProducts();

    public function deleteFile(array $file, $disk = null) : bool;*/

    public function findProducts() : Collection;

    public function findCategoryBySlug(string $slug) : Category;

    public function parentCategories();

}