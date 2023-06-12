<?php

namespace App\Observers;

use App\Models\OpenTrial;
use App\Models\OpenTrialAnswer;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Auth;

class OpenTrialAnswerObserver
{
    /**
     * Handle the game "creating" event.
     */
    public function creating(OpenTrialAnswer $openTrialAnswer): void
    {
        $openTrialAnswer->id = Uuid::uuid();
        $openTrialAnswer->user_id = Auth()->id();
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
