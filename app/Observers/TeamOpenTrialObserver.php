<?php

namespace App\Observers;

use App\Models\Game;
use App\Models\TeamOpenTrial;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Auth;

class TeamOpenTrialObserver
{
    /**
     * Handle the teamOpenTrial "creating" event.
     */
    public function creating(TeamOpenTrial $teamOpenTrial): void
    {
        $teamOpenTrial->id = Uuid::uuid();
        $teamOpenTrial->user_id = Auth()->id();
    }

    /**
     * Handle the teamOpenTrial "updated" event.
     */
    public function updated(TeamOpenTrial $teamOpenTrial): void
    {
        
    }

    /**
     * Handle the teamOpenTrial "force deleted" event.
     */
    public function forceDeleted(TeamOpenTrial $teamOpenTrial): void
    {
        //
    }
}
