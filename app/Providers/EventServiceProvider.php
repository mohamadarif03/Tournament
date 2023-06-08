<?php

namespace App\Providers;

use App\Models\Competitor;
use App\Models\CompetitorRegistrant;
use App\Models\Game;
use App\Models\OpenTrial;
use App\Models\OpenTrialQuestion;
use App\Models\Team;
use App\Models\TeamOpenTrial;
use App\Models\Tournament;
use App\Models\User;
use App\Observers\CompetitorObserver;
use App\Observers\CompetitorRegistrantObserver;
use App\Observers\GameObserver;
use App\Observers\OpenTrialObserver;
use App\Observers\OpenTrialQuestionObserver;
use App\Observers\TeamObserver;
use App\Observers\TeamOpenTrialObserver;
use App\Observers\TournamentObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
        Team::observe(TeamObserver::class);
        Game::observe(GameObserver::class);
        Competitor::observe(CompetitorObserver::class);
        CompetitorRegistrant::observe(CompetitorRegistrantObserver::class);
        Tournament::observe(TournamentObserver::class);
        TeamOpenTrial::observe(TeamOpenTrialObserver::class);
        OpenTrial::observe(OpenTrialObserver::class);
        OpenTrialQuestion::observe(OpenTrialQuestionObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
