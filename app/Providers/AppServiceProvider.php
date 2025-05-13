<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(
        // which views should receive the data? Use a wildcard for all:
        ['products.*', 'layouts.sidebar', 'other.view'],
        function ($view) {
            $group = request()->route('group'); 
            $subcategories = $group
                ? Category::where('group', $group)->pluck('name')
                : collect();
            $view->with('subcategories', $subcategories);
        });
}
}