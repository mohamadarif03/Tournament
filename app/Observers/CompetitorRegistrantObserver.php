<?php

namespace App\Observers;

use App\Models\CompetitorRegistrant;
use App\Models\Game;
use Faker\Provider\Uuid;

class CompetitorRegistrantObserver
{
    /**
     * Handle the game "creating" event.
     */
    public function creating(CompetitorRegistrant $competitorregistrant): void
    {
        $competitorregistrant->id = Uuid::uuid();
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
