<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Kategori;
use Carbon\Carbon;

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
        Carbon::setLocale('tr');

        View::composer('*', function ($view) {
            $categories = Kategori::withCount('bloglar')
                ->orderBy('bloglar_count', 'desc')
                ->limit(5)
                ->get();

            $view->with('topCategories', $categories);
        });
    }
}
