<?php

namespace App\Http\Controllers\Api;

use App\Domain\Api\Category\CategoryServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Http\Requests\CategoryApi\CategoryApiCreateRequest;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ResponseTrait;

    private CategoryServiceInterface $categoryServiceInterface;

    public function __construct(CategoryServiceInterface $categoryServiceInterface)
    {
        $this->categoryServiceInterface = $categoryServiceInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->formattedJson($this->categoryServiceInterface->index($request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryApiCreateRequest $request)
    {
        return $this->formattedJson($this->categoryServiceInterface->store($request->validated()));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function find(int $id)
    {
        return $this->formattedJson($this->categoryServiceInterface->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, int $id)
    {
        return $this->formattedJson($this->categoryServiceInterface->update($id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->formattedJson($this->categoryServiceInterface->delete($id));
    }
}
