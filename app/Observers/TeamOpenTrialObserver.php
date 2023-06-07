<?php

namespace App\Observers;

use App\Models\Game;
use App\Models\TeamOpenTrial;
use Faker\Provider\Uuid;

class TeamOpenTrialObserver
{
    /**
     * Handle the game "creating" event.
     */
    public function creating(TeamOpenTrial $teamOpenTrial): void
    {
        $teamOpenTrial->id = Uuid::uuid();
    }

    /**
     * Handle the game "updated" event.
     */
    public function updated(Game $game): void
    {
        //
    }

    /**
     * Handle the game "force deleted" event.
     */
    public function forceDeleted(Game $game): void
    {
        //
    }
}
