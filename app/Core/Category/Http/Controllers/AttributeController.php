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
        $types = $this->attributeService->getTypes();

        return view('attributes.index', compact('types'));
    }

    public function attributesByType(Request $request)
    {
        $attributeType = $request->type;
        $attributes = $this->attributeService->getByType($attributeType);

        return view('attributes.byType', compact('attributes'));
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
