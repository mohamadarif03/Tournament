<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Interfaces\GameInterface;
use App\Contracts\Interfaces\TeamPlayerInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use App\Services\TeamService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeamhomeController extends Controller
{
    private GameInterface $game;
    private TeamService $service;
    private TeamPlayerInterface $teamPlayer;
    private UserInterface $user;


    public function __construct(GameInterface $game, TeamService $service, TeamPlayerInterface $teamPlayer, UserInterface $user)
    {
        $this->game = $game;
        $this->service = $service;
        $this->user = $user;
        $this->teamPlayer = $teamPlayer;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        $service = $this->service->HandleTeamFilter($request);

        if ($request->ajax()) {
            $view = view('pages.cursor.infinite-team')->with('teams', $service['teams'])->render();

            return ResponseHelper::success([
                'html' => $view,
                'nextCursor' => $service['nextCursor']
            ]);
        }

        $games = $this->game->get();
        return view('pages.home.team.list-team',  [
            'teams' => $service['teams'],
            'nextCursor' => $service['nextCursor'],
            'games' => $games
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     * @param Team $team
     */
    public function detail(Team $team)
    {
        $teamPlayers = $this->teamPlayer->get();
        return view('pages.home.team.team-detail', compact('team', 'teamPlayers'));
    }

    public function player(User $user)
    {
        $teams = $this->user->show($user->id);
        // dd($teams);
        return view('pages.home.player.profil', compact('user', 'teams'));
    }
    
}
