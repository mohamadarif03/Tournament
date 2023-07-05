<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasTeams
{

    /**
     * One-to-Many relationship with Team Model
     *
     * @return HasMany
     */

    public function team(): HasMany;
}
