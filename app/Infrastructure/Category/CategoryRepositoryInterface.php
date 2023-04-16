<?php

namespace App\Infrastructure\Category;

interface CategoryRepositoryInterface
{
    public function paginate(?int $perPage, array $columns = ['*']): \Illuminate\Contracts\Pagination\LengthAwarePaginator;

    public function find(int $id, array $columns = ['*']): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static|null;

    public function create(array $attributes): \Illuminate\Database\Eloquent\Model;

    public function update(int $id, array $attributes): int;

    public function delete(int $id): mixed;
}
