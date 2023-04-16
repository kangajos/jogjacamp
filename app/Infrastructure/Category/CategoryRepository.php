<?php

namespace App\Infrastructure\Category;

use App\Jobs\SendMailCRUDCategoryJob;
use App\Models\Category;
use App\Models\User;

class CategoryRepository implements CategoryRepositoryInterface
{
    private Category $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function paginate(?int $perPage, array $columns = ['*']): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = $this->model->query();

        if ($q = request()->get('q')) {
            $query->where('name', 'like', "%$q%");
        }

        return $query->paginate($perPage, $columns)->appends(request()->all(['limit', 'name', 'is_publish', 'page']));
    }

    public function find(int $id, array $columns = ['*']): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static|null
    {
        return $this->model->query()->find($id, $columns);
    }

    public function create(array $attributes): \Illuminate\Database\Eloquent\Model
    {
        return $this->model->query()->create($attributes);
    }

    public function update(int $id, array $attributes): int
    {
        return $this->model->query()->where('id', $id)->update($attributes);
    }

    public function delete(int $id): mixed
    {
        $data = [
            'event' => 'deleted',
            'category' => $this->find($id),
            'user' => User::first()
        ];
        dispatch(new SendMailCRUDCategoryJob($data));
        return $this->model->query()->where('id', $id)->delete();
    }
}
