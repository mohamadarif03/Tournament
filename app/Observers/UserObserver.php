<?php

namespace App\Observers;

use App\Models\user;
use Faker\Provider\Uuid;

class UserObserver
{
    /**
     * Handle the user "creating" event.
     */
    public function creating(user $user): void
    {
        $user->id = Uuid::uuid();
    }

    /**
     * Handle the user "updated" event.
     */
    public function updated(user $user): void
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     */
    public function forceDeleted(user $user): void
    {
        //
    }
}
