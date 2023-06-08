<?php

namespace App\Observers;

use App\Models\OpenTrial;
use App\Models\OpenTrialQuestion;
use Faker\Provider\Uuid;

class OpenTrialQuestionObserver
{
    /**
     * Handle the game "creating" event.
     */
    public function creating(OpenTrialQuestion $openTrialQuestion): void
    {
        $openTrialQuestion->id = Uuid::uuid();
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
