<?php

namespace App\Base\Interfaces;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasOpenTrials
{

    /**
     * One-to-Many relationship with User Model
     *
     * @return HasMany
     */

    public function openTrials(): HasMany;
}
