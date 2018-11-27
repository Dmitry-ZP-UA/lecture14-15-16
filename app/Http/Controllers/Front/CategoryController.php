<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Categories\Category;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    /**
     * @var
     */
    private $categoryRepository;

    /**
     * CategoryController constructor.
     *
     * @param Category $category
     */
    public function __construct(Category $category, CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->category = $category;
    }

    /**
     * Find the category via the slug
     * @param string $slug
     * @return Category
     */
    public function getCategory(string $slug)
    {
        $parentCategories = $this->categoryRepository->parentCategories();

        $category = $this->categoryRepository->findCategoryBySlug($slug);

        return view('front.categories.category', [
            'categories' => $parentCategories,
            'category' => $category
        ]);
    }
}
