<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasOpenTrial
{

    /**
     * One-to-Many relationship with User Model
     *
     * @return BelongsTo
     */

    public function openTrial(): BelongsTo;
}
