<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (request()->getHost() == 'development.hmjkimiauinalauddinmakassar.com'){
            $this->app->bind('path.public', function() {
                return base_path('/../public_html/development.hmjkimiauinalauddinmakassar.com');
            });
        } else{
            $this->app->bind('path.public', function() {
                return base_path('public_html');
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(199);
        // Blade::withoutDoubleEncoding();
        // if (request()->getHost() == 'development.hmjkimiauinalauddinmakassar.com'){
        //     // $path = '/../public_html/development.hmjkimiauinalauddinmakassar.com';
        // } else{
        //     // $path = 'public_html';
        //     echo request()->getHost();
        // }
    }
}
