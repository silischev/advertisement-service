<?php

namespace App\Core\Category\Http\Controllers;

use App\Core\Category\Services\CategoryService;

class CategoryController
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * CategoryController constructor.
     *
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @param int|null $parentId
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(int $parentId = null)
    {
        //$ancestors = !empty($parentId) ? $this->categoryService->getAncestors($parentId) : null;
        $categories = $this->categoryService->getByParent($parentId);

        return view('categories.main', compact('categories', 'parent'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function categoriesList()
    {
        return response()->json($this->categoryService->getAll());
    }
}