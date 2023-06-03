<?php

namespace App\Observers;

use App\Models\Competitor;
use App\Models\Game;
use Faker\Provider\Uuid;

class CompetitorObserver
{
    /**
     * Handle the game "creating" event.
     */
    public function creating(Competitor $competitor): void
    {
        $competitor->id = Uuid::uuid();
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
