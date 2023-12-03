<?php

namespace App\Enums\TaskEnums;

enum TaskStatuses: int
{
    case CREATED = 0;
    case DO = 1;
    case BLOCKED = 2;
    case DONE = 3;
}
