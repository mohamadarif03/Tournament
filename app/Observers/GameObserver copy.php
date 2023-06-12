<?php

namespace App\Observers;

use App\Models\Game;
use Faker\Provider\Uuid;
use Illuminate\Support\Str;

class GameObserver
{
    /**
     * Handle the game "creating" event.
     */
    public function creating(Game $game): void
    {
        $game->id = Uuid::uuid();
        $game->slug = Str::slug($game->name);
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
