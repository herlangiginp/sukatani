<?php

namespace App\Providers;



use Illuminate\Support\ServiceProvider;
use App\Models\Category;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        // Tambahkan pesan log untuk memastikan data kategori berhasil diambil
        \Log::info($categories);
        view()->share('categories', $categories);
    }
    
}
