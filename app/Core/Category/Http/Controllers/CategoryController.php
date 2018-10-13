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

    public function index(int $parentId = null)
    {
        $categories = $this->categoryService->getByParent($parentId);

        return view('categories.main', compact('categories'));
    }

    public function categoriesList()
    {
        return response()->json($this->categoryService->getAll());
    }
}