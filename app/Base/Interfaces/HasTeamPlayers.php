<?php

namespace App\Base\Interfaces;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasTeamPlayers
{

    /**
     * One-to-Many relationship with User Model
     *
     * @return HasMany
     */

    public function teamPlayers(): HasMany;
}
