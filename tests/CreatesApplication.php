<?php

namespace Tests;

use App\Enums\AppEnvNames;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;

trait CreatesApplication
{
    public function createApplication(): Application
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        $app->detectEnvironment(static function () {
            return AppEnvNames::TESTING->value;
        });

        return $app;
    }
}
