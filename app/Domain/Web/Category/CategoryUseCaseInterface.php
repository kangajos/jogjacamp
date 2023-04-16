<?php

namespace App\Domain\Web\Category;

use Illuminate\Http\Request;

interface CategoryUseCaseInterface
{
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory;

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory;

    public function store(array $data): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse;

    public function edit(int $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory;

    public function update(int $id, array $data): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse;

    public function delete(int $id): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse;
}
