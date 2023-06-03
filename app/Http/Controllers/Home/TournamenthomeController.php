<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Interfaces\GameInterface;
use App\Contracts\Interfaces\HomeTournamentDetailInterface;
use App\Contracts\Interfaces\TeamInterface;
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
    private TeamInterface $team;

    public function __construct(HomeTournamentDetailInterface $tournamentdetail, GameInterface $game, TournamentService $service, TeamInterface $team)
    {
        $this->tournamentdetail = $tournamentdetail;
        $this->game = $game;
        $this->team = $team;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function detail(Tournament $tournament): View
    {
        $tournamentmore = $this->tournamentdetail->showmore();
        return view('pages.home.tournament-detail', compact('tournament', 'tournamentmore'));
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
        
       
        return view('pages.home.tournament-list', [
            'tournamentlist' => $service['tournamentlist'],
            'nextCursor' => $service['nextCursor'],
            'games' => $games
        ]);
    }
    
}
