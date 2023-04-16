<?php

namespace App\Providers;

use App\Domain\Api\Category\CategoryService as CategoryCategoryService;
use App\Domain\Api\Category\CategoryServiceInterface;
use App\Domain\Web\Category\CategoryUseCase;
use App\Domain\Web\Category\CategoryUseCaseInterface;
use App\Http\Controllers\Api\CategoryController as ApiCategoryController;
use App\Http\Controllers\Web\CategoryController;
use App\Infrastructure\Category\CategoryRepository;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class CategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app
            ->when(CategoryController::class)
            ->needs(CategoryUseCaseInterface::class)
            ->give(function () {
                return new CategoryUseCase(new CategoryRepository(new Category()));
            });
            
            $this->app
            ->when(ApiCategoryController::class)
            ->needs(CategoryServiceInterface::class)
            ->give(function () {
                return new CategoryCategoryService(new CategoryRepository(new Category()));
            });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
