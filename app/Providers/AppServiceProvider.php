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

        if (Schema::hasTable('products')) {
            View::share('productBadge', DB::table('products')->count('id'));
        } else {
            View::share('productBadge', 0);
        }
        if (Schema::hasTable('categories')) {
            View::share('categoryBadge', DB::table('categories')->count('id'));
        } else {
            View::share('categoryBadge', 0);
        }
        if(Schema::hasTable('users')) {
            View::share('userBadge', DB::table('users')->count('id'));
        } else {
            View::share('userBadge', 0);
        }
        if(Schema::hasTable('roles')) {
            View::share('roleBadge', DB::table('roles')->count('id'));
        } else {
            View::share('roleBadge', 0);
        }
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
