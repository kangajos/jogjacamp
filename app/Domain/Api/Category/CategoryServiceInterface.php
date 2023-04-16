<?php

namespace App\Domain\Api\Category;

use Illuminate\Http\Request;

interface CategoryServiceInterface
{
    public function index(Request $request): mixed;

    public function store(array $data): mixed;

    public function find(int $id): mixed;

    public function update(int $id, array $data): mixed;

    public function delete(int $id): mixed;
}
