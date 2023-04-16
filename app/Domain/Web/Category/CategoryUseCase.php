<?php

namespace App\Domain\Web\Category;

use App\Infrastructure\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryUseCase implements CategoryUseCaseInterface
{
    private CategoryRepositoryInterface $categoryRepositoryInterface;

    public function __construct(CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
    }

    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $result = $this->categoryRepositoryInterface->paginate($request->get('limit', 10));
        return view('pages.category.index', compact('result'));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('pages.category.create');
    }

    public function store(array $data): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $this->categoryRepositoryInterface->create($data);
        return redirect()->route('category.index')->with('success', 'Data has been created.');
    }

    public function edit(int $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $result = $this->categoryRepositoryInterface->find($id);
        if (!$result) {
            return abort(404, 'DATA NOT FOUND');
        }
        return view('pages.category.edit', compact('result'));
    }

    public function update(int $id, array $data): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $this->categoryRepositoryInterface->update($id, $data);
        return redirect()->route('category.index')->with('success', 'Data has been updated.');
    }

    public function delete(int $id): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $this->categoryRepositoryInterface->delete($id);
        return redirect()->route('category.index')->with('success', 'Data has been deleted.');
    }
}
