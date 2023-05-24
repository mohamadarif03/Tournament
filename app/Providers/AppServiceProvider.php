<?php

namespace App\Providers;

use App\Contracts\Interfaces\GameInterface;
use App\Contracts\Interfaces\HomeGameInterface;
use App\Contracts\Interfaces\HomeTeamInterface;
use App\Contracts\Interfaces\TeamInterface;
use App\Contracts\Interfaces\TournamentInterface;
use App\Contracts\Repositories\GameRepository;
use App\Contracts\Repositories\HomeGameRepository;
use App\Contracts\Repositories\HomeTeamRepository;
use App\Contracts\Repositories\TeamRepository;
use App\Contracts\Repositories\TournamentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider 
{

    private array $register = [
        GameInterface::class => GameRepository::class,
        TeamInterface::class => TeamRepository::class,
        HomeTeamInterface::class => HomeTeamRepository::class,
        HomeGameInterface::class => HomeGameRepository::class,
        TournamentInterface::class => TournamentRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->register as $index => $value) $this->app->bind($index, $value);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    }
}
