<?php

namespace App\Enums;

enum PlayerPositionEnum: string
{
    case CAPTAIN = 'captain';
    case SUBSTITUTE = 'substitute';
    case PLAYER = 'player';
}
