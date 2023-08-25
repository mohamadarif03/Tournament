<?php

namespace App\Observers;

use App\Models\Tournament;
use App\Models\winner;
use Faker\Provider\Uuid;
use Illuminate\Support\Str;

class TournamentObserver
{
    /**
     * Handle the game "creating" event.
     */
    public function creating(Tournament $tournament): void
    {
        $tournament->id = Uuid::uuid();
        $tournament->user_id = auth()->id();
    }

    public function created(Tournament $tournament)
    {
        winner::create([
            'tournament_id' => $tournament->id
        ]);
    }
    
    public function updated(Tournament $tournament): void
    {
        //
    }

    /**
     * Handle the tournament "force deleted" event.
     */
    public function forceDeleted(Tournament $tournament): void
    {
        //
    }
}
