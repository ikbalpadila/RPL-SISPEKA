<?php

namespace App\Enum;

enum UserRole: string
{
    case ADMIN = 'admin';
    case GURU = 'guru';
    case WALI = 'wali';
}
