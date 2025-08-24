<?php

namespace App\Providers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('*', function ($view) {
            $view->with('footservices', Service::latest()->take(3)->get());
        });
        View::composer('*', function ($view) {
            $view->with('headerservices', Service::latest()->take(6)->get());
        });

        View::composer('*', function ($view) {
            $view->with('headerProjects', Project::latest()->take(5)->get());
        });
    }
}
