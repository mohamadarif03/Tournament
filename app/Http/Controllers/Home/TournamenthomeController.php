<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Interfaces\GameInterface;
use App\Contracts\Interfaces\HomeTournamentDetailInterface;
use App\Contracts\Interfaces\TeamInterface;
use App\Contracts\Interfaces\TournamentInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Tournament;
use App\Services\TournamentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TournamenthomeController extends Controller
{
    private HomeTournamentDetailInterface $tournamentdetail;
    private GameInterface $game;
    private TournamentService $service;
    private TournamentInterface $tournament;

    public function __construct(HomeTournamentDetailInterface $tournamentdetail, GameInterface $game, TournamentService $service, TournamentInterface $tournament)
    {
        $this->tournamentdetail = $tournamentdetail;
        $this->game = $game;
        $this->tournament = $tournament;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     * @param Tournament $tournament
     */
    public function detail(Tournament $tournament): View
    {
        $tournamentmore = $this->tournamentdetail->showmore();
        $tournamentId = $tournament->id;
        $countTournament = Tournament::withCount('competitors')->findOrFail($tournamentId);
        // dd($countTournament);
        return view('pages.home.tournament.tournament-detail', compact('tournament', 'tournamentmore', 'countTournament'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     * @param Tournament $tournament
     */
    public function showTeam(Tournament $tournament): View
    {
        $tourteam= $this->tournament->showTeam($tournament->id);
        // dd($tourteam);  
        return view('pages.home.tournament.tournament-detail-team', compact('tourteam'));
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View|JsonResponse
     */
    public function list(Request $request): View|JsonResponse
    {
        $service = $this->service->HandleTournamentFilter($request);

        if ($request->ajax()) {
            $view = view('pages.cursor.infinite-tournament')->with('tournamentlist', $service['tournamentlist'])->render();

            return ResponseHelper::success([
                'html' => $view,
                'nextCursor' => $service['nextCursor']
            ]);
        }
        $games = $this->game->get();


        return view('pages.home.tournament.tournament-list', [
            'tournamentlist' => $service['tournamentlist'],
            'nextCursor' => $service['nextCursor'],
            'games' => $games
        ]);
    }
}
