<?php

namespace App\Core\Category\Http\Controllers;

use App\Core\Category\Services\AttributeService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AttributeController extends Controller
{
    /**
     * @var AttributeService
     */
    private $attributeService;

    public function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;
    }

    public function index()
    {
        return response()->json($this->attributeService->getAll());
    }


    public function create()
    {
        // @TODO
    }

    public function store(Request $request)
    {
        // @TODO
    }

    public function show($id)
    {
        // @TODO
    }

    public function edit($id)
    {
        // @TODO
    }

    public function update(Request $request, $id)
    {
        // @TODO
    }

    public function destroy($id)
    {
        // @TODO
    }
}
