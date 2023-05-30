<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Interfaces\GameInterface;
use App\Contracts\Interfaces\HomeTournamentDetailInterface;
use App\Contracts\Interfaces\HomeTournamentListInterface;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\View\View;

class TornamenthomeController extends Controller
{
    private HomeTournamentDetailInterface $tournamentdetail;
    private GameInterface $game;
    private HomeTournamentListInterface $tournamentlist;

    public function __construct(HomeTournamentDetailInterface $tournamentdetail, HomeTournamentListInterface $tournamentlist, GameInterface $game)
    {
        $this->tournamentdetail = $tournamentdetail;
        $this->game = $game;
        $this->tournamentlist = $tournamentlist;
    }
    public function detail(): View
    {
        $tournamentdetail = $this->tournamentdetail->get();
        return view('pages.home.tournament-detail', compact('tournamentdetail'));
    }
    public function list(): View
    {
        $tournamentlist = $this->tournamentlist->get();
        $games = $this->game->get();
        $tournament = $tournamentlist->first();
        $time = Carbon::parse($tournament->starter_at)->translatedFormat('d F Y H:i');

        return view('pages.home.tournament-list', compact('tournamentlist', 'time', 'games'));
    }
}
