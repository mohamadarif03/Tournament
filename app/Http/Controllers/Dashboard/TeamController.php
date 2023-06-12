<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\Interfaces\GameInterface;
use App\Contracts\Interfaces\OpenTrialInterface;
use App\Contracts\Interfaces\OpenTrialQuestionInterface;
use App\Contracts\Interfaces\TeamInterface;
use App\Contracts\Interfaces\TeamOpenTrialInterface;
use App\Enums\UserRoleEnum;
use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Models\OpenTrial;
use App\Models\Team;
use App\Services\TeamService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    private TeamInterface $team;
    private GameInterface $game;
    private OpenTrialInterface $openTrial;
    private OpenTrialQuestionInterface $openTrialQuestion;
    private TeamOpenTrialInterface $teamOpenTrial;
    private TeamService $service;

    public function __construct(TeamInterface $team, GameInterface $game, TeamService $service, OpenTrialInterface $openTrial, OpenTrialQuestionInterface $openTrialQuestion, TeamOpenTrialInterface $teamOpenTrial)
    {
        $this->team = $team;
        $this->game = $game;
        $this->service = $service;
        $this->openTrial = $openTrial;
        $this->teamOpenTrial = $teamOpenTrial;
        $this->openTrialQuestion = $openTrialQuestion;
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View|JsonResponse
     */

    public function index(Request $request): View|JsonResponse
    {
        if (UserHelper::getUserRole() === UserRoleEnum::ADMIN->value) {
            if ($request->ajax()) return $this->team->get();
            return view('pages.dashboard.team.index');
        } else {
            $teams = $this->team->showMore();
            return view('pages.user.team.index', compact('teams'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $games = $this->game->get();
        return view('pages.dashboard.team.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeamRequest $request
     * @return RedirectResponse
     */
    public function store(TeamRequest $request): RedirectResponse
    {
        $store = $this->service->store($request);
        $this->team->store($store);
        return to_route('team.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team, OpenTrial $openTrial)
    {
        $openTrials = $this->openTrial->show($team->id);
        $idOpenTrial = $openTrials ? $openTrials->pluck('id')->toArray() : [];

        $openTrialQuestions = [];
        if (!empty($idOpenTrial)) {
            $openTrialQuestions = $this->openTrialQuestion->show($idOpenTrial);
        }
        $teamOpenTrials = $this->teamOpenTrial->show($team->id);

        return view('pages.dashboard.team.detail', compact('team', 'openTrials', 'openTrialQuestions', 'teamOpenTrials'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param Team $tean
     * @return View
     */

    public function edit(Team $team)
    {
        $games = $this->game->get();
        return view('pages.dashboard.team.edit', compact(['games', 'team']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamUpdateRequest $request, Team $team)
    {
        $store = $this->service->update($request, $team);

        $this->team->update($team->id, $store);
        return to_route('team.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team): RedirectResponse
    {
        if (!$this->team->delete($team->id)) {
            return back();
        }
        $this->service->remove($team->logo);
        return back()->with('success', trans('alert.delete_success'));
    }
}
