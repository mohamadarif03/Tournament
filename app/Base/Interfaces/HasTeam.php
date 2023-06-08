<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasTeam
{

    /**
     * One-to-Many relationship with User Model
     *
     * @return BelongsTo
     */

    public function team(): BelongsTo;
}
