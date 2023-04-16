<?php

namespace App\Http\Controllers\Web;

use App\Domain\Web\Category\CategoryUseCaseInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryUseCaseInterface $categoryUseCaseInterface;

    public function __construct(CategoryUseCaseInterface $categoryUseCaseInterface)
    {
        $this->categoryUseCaseInterface = $categoryUseCaseInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->categoryUseCaseInterface->index($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->categoryUseCaseInterface->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        return $this->categoryUseCaseInterface->store($request->validated());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return $this->categoryUseCaseInterface->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, int $id)
    {
        return $this->categoryUseCaseInterface->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->categoryUseCaseInterface->delete($id);
    }
}
