<?php

namespace App\Observers;

use App\Models\OpenTrial;
use Faker\Provider\Uuid;

class OpenTrialObserver
{
    /**
     * Handle the game "creating" event.
     */
    public function creating(OpenTrial $openTrial): void
    {
        $openTrial->id = Uuid::uuid();
    }

    /**
     * Handle the game "updated" event.
     */
    public function updated(OpenTrial $openTrial): void
    {
        //
    }

    /**
     * Handle the game "force deleted" event.
     */
    public function forceDeleted(OpenTrial $openTrial): void
    {
        //
    }
}
