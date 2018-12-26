<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::share('productBadge', DB::table('products')->count('id'));
        View::share('categoryBadge', DB::table('categories')->count('id'));
        View::share('userBadge', DB::table('users')->count('id'));
        View::share('roleBadge', DB::table('roles')->count('id'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerRepositories();
    }

    /**
     * Register repositories (singletones)
     */
    private function registerRepositories(): void
    {
        $this->app->singleton(ProductRepository::class);
        $this->app->singleton(CategoryRepository::class);
    }
}
