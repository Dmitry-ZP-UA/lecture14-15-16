<?php

namespace App\Http\ViewComposers;

use App\Shop\Categories\Category;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\View\View;

class CategoriesComposer
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;
    /**
     * CategoriesComposer constructor.
     * @param Category $category
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $categories = $this->categoryRepository->listCategories();

        $view->with('categories', $categories);
    }
}
