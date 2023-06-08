<?php

namespace App\Providers;

use App\Contracts\Interfaces\CompetitorInterface;
use App\Contracts\Interfaces\CompetitorRegistrantInterface;
use App\Contracts\Interfaces\GameInterface;
use App\Contracts\Interfaces\HomeGameInterface;
use App\Contracts\Interfaces\HomeTeamInterface;
use App\Contracts\Interfaces\HomeTournamentDetailInterface;
use App\Contracts\Interfaces\HomeTournamentListInterface;
use App\Contracts\Interfaces\OpenTrialAnswerInterface;
use App\Contracts\Interfaces\OpenTrialInterface;
use App\Contracts\Interfaces\OpenTrialQuestionInterface;
use App\Contracts\Interfaces\RegisterInterface;
use App\Contracts\Interfaces\TeamInterface;
use App\Contracts\Interfaces\TeamOpenTrialInterface;
use App\Contracts\Interfaces\TournamentInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Repositories\CompetitorRegistrantRepository;
use App\Contracts\Repositories\CompetitorRepository;
use App\Contracts\Repositories\GameRepository;
use App\Contracts\Repositories\HomeGameRepository;
use App\Contracts\Repositories\HomeTeamRepository;
use App\Contracts\Repositories\HomeTournamentDetailRepository;
use App\Contracts\Repositories\HomeTournamentListRepository;
use App\Contracts\Repositories\OpenTrialAnswerRepository;
use App\Contracts\Repositories\OpenTrialQuestionRepository;
use App\Contracts\Repositories\OpenTrialRepository;
use App\Contracts\Repositories\RegisterRepository;
use App\Contracts\Repositories\TeamOpenTrialRepository;
use App\Contracts\Repositories\TeamRepository;
use App\Contracts\Repositories\TournamentRepository;
use App\Contracts\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider 
{

    private array $register = [
        GameInterface::class => GameRepository::class,
        TeamInterface::class => TeamRepository::class,
        HomeTeamInterface::class => HomeTeamRepository::class,
        HomeGameInterface::class => HomeGameRepository::class,
        HomeTournamentDetailInterface::class => HomeTournamentDetailRepository::class,
        HomeTournamentListInterface::class => HomeTournamentListRepository::class,
        TournamentInterface::class => TournamentRepository::class,
        RegisterInterface::class => RegisterRepository::class,
        CompetitorInterface::class => CompetitorRepository::class,
        CompetitorRegistrantInterface::class => CompetitorRegistrantRepository::class,
        UserInterface::class => UserRepository::class,
        TeamOpenTrialInterface::class => TeamOpenTrialRepository::class,
        OpenTrialInterface::class => OpenTrialRepository::class,
        OpenTrialQuestionInterface::class => OpenTrialQuestionRepository::class,
        OpenTrialAnswerInterface::class => OpenTrialAnswerRepository::class,
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
        // Validator::extends('recaptcha', 'App\\Validator\\ReCaptcha@validate');
    }
}
