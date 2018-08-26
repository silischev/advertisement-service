<?php

namespace App\Core\Category\Http\Controllers;

use App\Core\Category\Services\CategoryService;

class CategoryController
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $this->categoryService->getCategoriesAsTree();
        return view('categories.index');
    }

}