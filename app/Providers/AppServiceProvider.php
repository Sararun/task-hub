<?php

namespace App\Providers;

use App\Enums\AppEnvNames;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\Test\LoginRequestTest;
use App\Interfaces\Requests\LoginRequestInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(LoginRequestInterface::class, static function () {
            if (App::environment() == AppEnvNames::TESTING->value) {
                return new LoginRequestTest();
            } else {
                return new LoginRequest();
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        if (App::environment() == 'testing') {
//            dd(2);
//        }
    }
}
