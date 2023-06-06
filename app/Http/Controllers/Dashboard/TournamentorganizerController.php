<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\Interfaces\TournamentInterface;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TournamentorganizerController extends Controller
{
    private TournamentInterface $tournament;

    public function __construct(TournamentInterface $tournament)
    {
        $this->tournament = $tournament;  
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tournaments = $this->tournament->showMore();
        return view('pages.organizer.tournament.index', compact('tournaments'));
    }
}
