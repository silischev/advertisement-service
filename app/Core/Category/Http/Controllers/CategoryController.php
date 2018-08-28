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
        $categories = $this->categoryService->getAll();

        return view('categories.index', compact('categories'));
    }
}