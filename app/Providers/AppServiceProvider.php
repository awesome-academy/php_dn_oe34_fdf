<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Services\AuthService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton('auth_service', AuthService::class);
        app()->singleton('base_repository', BaseRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
