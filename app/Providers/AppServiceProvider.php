<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $lowStockCount = 0;

        if (Schema::hasTable('products')) {

            $lowStockCount = Product::where('quantity', '<=', 5)->count();

        }

        View::share('lowStockCount', $lowStockCount);
    }
}
