<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Interfaces\OpenTrialInterface;
use App\Contracts\Interfaces\TeamOpenTrialInterface;
use App\Contracts\Interfaces\TeamPlayerInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamOpenTrialRequest;
use App\Http\Requests\TeamPlayerRejectRequest;
use App\Http\Requests\TeamPlayerRequest;
use App\Models\Team;
use App\Models\TeamOpenTrial;
use App\Services\OpenTrialAnswerService;
use App\Services\TeamOpenTrialService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class JointeamController extends Controller
{
    private TeamOpenTrialInterface $teamOpenTrial;
    private TeamPlayerInterface $teamPlayer;
    private OpenTrialInterface $openTrial;
    private TeamOpenTrialService $service;
    private OpenTrialAnswerService $openTrialAnswerService;
    public function __construct(TeamOpenTrialInterface $teamOpenTrial, TeamOpenTrialService $service, OpenTrialAnswerService $openTrialAnswerService, OpenTrialInterface $openTrial, TeamPlayerInterface $teamPlayer)
    {
        $this->openTrial = $openTrial;
        $this->teamOpenTrial = $teamOpenTrial;
        $this->service = $service;
        $this->teamPlayer = $teamPlayer;
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

    public function acc(TeamPlayerRequest $request): RedirectResponse
    {
        $this->teamPlayer->store($request->validated());
        return redirect()->back();   
    }

    public function reject(TeamPlayerRejectRequest $request, TeamOpenTrial $teamOpenTrial): RedirectResponse
    {
        $this->teamOpenTrial->update($teamOpenTrial->id, $request->validated());
        return redirect()->back();
    }
    
}
