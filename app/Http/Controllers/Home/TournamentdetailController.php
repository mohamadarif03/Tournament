<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Interfaces\HomeTournamentDetailInterface;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TournamentdetailController extends Controller
{
    private HomeTournamentDetailInterface $tournament;

    public function __construct(HomeTournamentDetailInterface $tournament)
    {
        $this->tournament = $tournament;
    }
    public function index(): View
    {
        $tournaments = $this->tournament->get();
        return view('pages.home.tournament-detail', compact('tournaments'));
    }
}
