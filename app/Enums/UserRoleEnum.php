<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case ADMIN = 'admin';
    case ORGANIZER = 'organizer';
    case Player = 'player';
}
