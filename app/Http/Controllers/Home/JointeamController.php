<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Interfaces\OpenTrialInterface;
use App\Contracts\Interfaces\OpenTrialQuestionInterface;
use App\Contracts\Interfaces\TeamInterface;
use App\Contracts\Interfaces\TeamOpenTrialInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\OpenTrialAnswerRequest;
use App\Http\Requests\TeamOpenTrialRequest;
use App\Models\Team;
use App\Services\OpenTrialAnswerService;
use App\Services\TeamOpenTrialService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class JointeamController extends Controller
{
    private TeamInterface $team;
    private OpenTrialQuestionInterface $openTrialQuestion;
    private TeamOpenTrialInterface $teamOpenTrial;
    private OpenTrialInterface $openTrial;
    private TeamOpenTrialService $service;
    private OpenTrialAnswerService $openTrialAnswerService;
    public function __construct(TeamInterface $team, OpenTrialQuestionInterface $openTrialQuestion, TeamOpenTrialInterface $teamOpenTrial, TeamOpenTrialService $service, OpenTrialAnswerService $openTrialAnswerService, OpenTrialInterface $openTrial)
    {
        $this->team = $team;
        $this->openTrial = $openTrial;
        $this->openTrialQuestion = $openTrialQuestion;
        $this->teamOpenTrial = $teamOpenTrial;
        $this->service = $service;
        $this->openTrialAnswerService = $openTrialAnswerService;
    }

    public function index(Team $team): View
    {
        $openTrials = $this->openTrial->show($team->id);
        return view('pages.home.team.join-team', compact('team', 'openTrials'));
    }
    public function join(TeamOpenTrialRequest $request): RedirectResponse
    {
        $this->teamOpenTrial->store($this->service->store($request));
        $this->openTrialAnswerService->store($request->validated(), $request);
        return to_route('teams')->with('success', trans('alert.add_success'));   
    }
    
}
