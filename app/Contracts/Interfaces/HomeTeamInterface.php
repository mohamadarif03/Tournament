<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CursorPaginateInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;

interface HomeTeamInterface extends GetInterface, ShowInterface, CursorPaginateInterface
{

}
