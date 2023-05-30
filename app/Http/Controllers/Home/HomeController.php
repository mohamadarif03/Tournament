<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Interfaces\HomeGameInterface;
use App\Contracts\Interfaces\HomeInterface;
use App\Contracts\Interfaces\HomeTeamInterface;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    private HomeTeamInterface $team;
    private HomeGameInterface $game;

    public function __construct(HomeTeamInterface $team, HomeGameInterface $game)
    {
        $this->team = $team;
        $this->game = $game;
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        $teams = $this->team->get();
        $games = $this->game->get();
        return view('pages.home.index', compact(['teams', 'games']));
    }
    
}
