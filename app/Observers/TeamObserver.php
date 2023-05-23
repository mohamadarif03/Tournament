<?php

namespace App\Observers;

use App\Models\Team;
use Faker\Provider\Uuid;

class TeamObserver
{
    /**
     * Handle the team "creating" event.
     */
    public function creating(Team $team): void
    {
        $team->id = Uuid::uuid();
        $team->user_id = auth()->id();
    }

    /**
     * Handle the game "updated" event.
     */
    public function updated(Team $team): void
    {
        //
    }

    /**
     * Handle the team "force deleted" event.
     */
    public function forceDeleted(Team $team): void
    {
        //
    }
}
