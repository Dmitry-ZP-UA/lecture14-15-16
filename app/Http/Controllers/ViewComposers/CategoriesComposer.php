<?php

namespace App\Http\ViewComposers;

use App\Shop\Categories\Category;
use Illuminate\View\View;

class CategoriesComposer
{
    /**
     * @var Category
     */
    protected $category;

    /**
     * CategoriesComposer constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $categories = $this->category->with(['images', 'subCategories'])->parent()->get();

        $view->with('categories', $categories);
    }
}
