<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasGame
{

    /**
     * One-to-Many relationship with Game Model
     *
     * @return BelongsTo
     */

    public function game(): BelongsTo;
}
