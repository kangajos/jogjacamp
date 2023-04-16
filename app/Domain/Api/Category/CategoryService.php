<?php

namespace App\Domain\Api\Category;

use App\Domain\Api\Category\CategoryServiceInterface;
use App\Infrastructure\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryService implements CategoryServiceInterface
{
    private CategoryRepositoryInterface $categoryRepositoryInterface;

    public function __construct(CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
    }

    public function index(Request $request): mixed
    {
        return $this->categoryRepositoryInterface->paginate($request->get('limit', 10));
    }

    public function store(array $data): mixed
    {
        return $this->categoryRepositoryInterface->create($data);
    }

    public function find(int $id): mixed
    {
        return $this->categoryRepositoryInterface->find($id);
    }

    public function update(int $id, array $data): mixed
    {
        return $this->categoryRepositoryInterface->update($id, $data);
    }

    public function delete(int $id): mixed
    {
        return $this->categoryRepositoryInterface->delete($id);
    }
}
