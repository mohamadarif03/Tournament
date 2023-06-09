<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasOpenTrialAnswers
{

    /**
     * One-to-Many relationship with User Model
     *
     * @return HasMany
     */

    public function openTrialAnswer(): HasMany;
}
