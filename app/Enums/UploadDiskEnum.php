<?php

namespace App\Enums;

enum UploadDiskEnum: string
{
    case GAME = 'game';
    case TEAM = 'team';
    case TOURNAMENT = 'tournament';
    case CV = 'cv';
}
