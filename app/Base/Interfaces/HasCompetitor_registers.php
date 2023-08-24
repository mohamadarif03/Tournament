<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface hasCompetitor_registers
{

    /**
     * One-to-Many relationship with User Model
     *
     * @return HasMany
     */

    public function competitor_registers(): HasMany;
}
