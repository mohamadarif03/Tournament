<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasTournament
{

    /**
     * One-to-Many relationship with Team Model
     *
     * @return HasMany
     */

    public function tournament(): HasMany;
}
