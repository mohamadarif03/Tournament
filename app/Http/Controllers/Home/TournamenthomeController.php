<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Interfaces\GameInterface;
use App\Contracts\Interfaces\HomeTournamentDetailInterface;
use App\Contracts\Interfaces\HomeTournamentListInterface;
use App\Http\Controllers\Controller;
use App\Services\TournamentService;
use Carbon\Carbon;
use Illuminate\View\View;

class TournamenthomeController extends Controller
{
    private HomeTournamentDetailInterface $tournamentdetail;
    private GameInterface $game;
    private TournamentService $service;
    private HomeTournamentListInterface $tournamentlist;

    public function __construct(HomeTournamentDetailInterface $tournamentdetail, HomeTournamentListInterface $tournamentlist, GameInterface $game, TournamentService $service)
    {
        $this->tournamentdetail = $tournamentdetail;
        $this->game = $game;
        $this->tournamentlist = $tournamentlist;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function detail(): View
    {
        $tournamentdetail = $this->tournamentdetail->get();
        return view('pages.home.tournament-detail', compact('tournamentdetail'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function list(): View
    {
        $tournamentlist = $this->tournamentlist->get();
        $parameters = null;

        if (request()->has('search')) {
            $schools = $this->service->get(request()->search);
            $parameters = request()->query();
        }
        $games = $this->game->get();
        $tournament = $tournamentlist->first();
        $time = Carbon::parse($tournament->starter_at)->translatedFormat('d F Y H:i');

        return view('pages.home.tournament-list', compact('tournamentlist', 'time', 'games'));
    }
}
