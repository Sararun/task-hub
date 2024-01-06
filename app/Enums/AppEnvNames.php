<?php

namespace App\Enums;

enum AppEnvNames: string
{
    case PRODUCTION = 'production';
    case TESTING = 'testing';
    case LOCAL = 'local';
}
