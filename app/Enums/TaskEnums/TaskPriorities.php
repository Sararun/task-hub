<?php

namespace App\Enums\TaskEnums;

enum TaskPriorities: int
{
    case UNDEFINED = 0;
    case LOW       = 1;
    case MIDDLE    = 2;
    case HIGH      = 3;
}
