<?php

namespace App\Enums;

enum Role: int
{
    case ADMIN = 1;
    case USER = 2;

    public function name(): string
    {
        return match ($this) {
            Role::ADMIN => 'Админ',
            Role::USER => 'Пользователь',
        };
    }
}
