<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Interfaces\GameInterface;
use App\Contracts\Interfaces\HomeTeamInterface;
use App\Contracts\Interfaces\OpenTrialQuestionInterface;
use App\Contracts\Interfaces\TeamOpenTrialInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\OpenTrialAnswerRequest;
use App\Http\Requests\TeamOpenTrialRequest;
use App\Models\Team;
use App\Services\OpenTrialAnswerService;
use App\Services\TeamOpenTrialService;
use App\Services\TeamService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeamhomeController extends Controller
{
    private TeamOpenTrialInterface $team;
    private OpenTrialQuestionInterface $openTrialQuestion;
    private GameInterface $game;
    private TeamService $service;
    private TeamOpenTrialService $openTrialService;
    private OpenTrialAnswerService $openTrialAnswerService;


    public function __construct(TeamOpenTrialInterface $team, GameInterface $game, TeamService $service, TeamOpenTrialService $openTrialService, OpenTrialQuestionInterface $openTrialQuestion, OpenTrialAnswerService $openTrialAnswerService)
    {
        $this->team = $team;
        $this->game = $game;
        $this->service = $service;
        $this->openTrialQuestion = $openTrialQuestion;
        $this->openTrialService = $openTrialService;
        $this->openTrialAnswerService = $openTrialAnswerService;
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
     */
    public function detail(Team $team)
    {
        return view('pages.home.team.team-detail', compact('team'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function view(Team $team): View
    {
        $openTrialQuestions = $this->openTrialQuestion->get();
        return view('pages.home.team.join-team', compact('team', 'openTrialQuestions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeamOpenTrialRequest $request
     * @return RedirectResponse
     */
    public function join(TeamOpenTrialRequest $request): RedirectResponse
    {

        $this->team->store($this->openTrialService->store($request));
        $this->openTrialAnswerService->store($request->validated(), $request);

        return redirect()->route('teams')->with('success', trans('alert.add_success'));
    }
}
