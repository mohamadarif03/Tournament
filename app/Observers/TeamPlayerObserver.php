<?php

namespace App\Observers;

use App\Models\TeamPlayer;
use Faker\Provider\Uuid;

class GameObserver
{
    /**
     * Handle the game "creating" event.
     */
    public function creating(TeamPlayer $teamPlayer): void
    {
        $teamPlayer->id = Uuid::uuid();
    }

    /**
     * Handle the game "updated" event.
     */
    public function updated(TeamPlayer $teamPlayer): void
    {
        //
    }

    /**
     * Handle the game "force deleted" event.
     */
    public function forceDeleted(TeamPlayer $teamPlayer): void
    {
        //
    }
}
