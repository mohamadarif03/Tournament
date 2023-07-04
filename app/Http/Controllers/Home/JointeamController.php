<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Interfaces\OpenTrialInterface;
use App\Contracts\Interfaces\OpenTrialQuestionInterface;
use App\Contracts\Interfaces\TeamOpenTrialInterface;
use App\Contracts\Interfaces\TeamPlayerInterface;
use App\Enums\StatusDiskEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamOpenTrialRequest;
use App\Http\Requests\TeamPlayerRejectRequest;
use App\Http\Requests\TeamPlayerRequest;
use App\Models\OpenTrial;
use App\Models\OpenTrialQuestion;
use App\Models\Team;
use App\Models\TeamOpenTrial;
use App\Services\OpenTrialAnswerService;
use App\Services\TeamOpenTrialService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;

class JointeamController extends Controller
{
    private TeamOpenTrialInterface $teamOpenTrial;
    private TeamPlayerInterface $teamPlayer;
    private OpenTrialInterface $openTrial;
    private OpenTrialQuestionInterface $openTrialQuestion;
    private TeamOpenTrialService $service;
    private OpenTrialAnswerService $openTrialAnswerService;
    public function __construct(TeamOpenTrialInterface $teamOpenTrial, TeamOpenTrialService $service, OpenTrialAnswerService $openTrialAnswerService, OpenTrialInterface $openTrial, TeamPlayerInterface $teamPlayer, OpenTrialQuestionInterface $openTrialQuestion)
    {
        $this->openTrial = $openTrial;
        $this->teamOpenTrial = $teamOpenTrial;
        $this->service = $service;
        $this->teamPlayer = $teamPlayer;
        $this->openTrialQuestion = $openTrialQuestion;
        $this->openTrialAnswerService = $openTrialAnswerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Team $team
     * @return View
     */
    public function index(Team $team): View
    {
        $openTrials = $this->openTrial->show($team->id);
        return view('pages.home.team.join-team', compact('team', 'openTrials'));
    }
    /**
     * Display a listing of the resource.
     *
     * @param openTrial $team
     */
    public function questionOpenTrial(OpenTrial $openTrial)
    {
        $data = $this->openTrialQuestion->show($openTrial->id);
        return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param TeamOpenTrialRequest $request
     * @return RedirectResponse
     */
    public function join(TeamOpenTrialRequest $request): RedirectResponse
    {
        $this->teamOpenTrial->store($this->service->store($request));
        $this->openTrialAnswerService->store($request->validated(), $request);
        return to_route('teams')->with('success', trans('alert.add_success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeamPlayerRequest $request
     * @return RedirectResponse
     */
    public function acc(TeamPlayerRequest $request): RedirectResponse
    {
        $this->teamPlayer->store($request->validated());

        $teamOpenTrial = TeamOpenTrial::where('team_id', $request->validated()['team_id'])
            ->where('user_id', $request->validated()['user_id'])
            ->first();
        $teamOpenTrial->status = StatusDiskEnum::ACCEPTED->value;
        $teamOpenTrial->save();
        return redirect()->back(); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeamPlayerRejectRequest $request
     * @param TeamOpenTrial $teamOpenTrial
     * @return RedirectResponse
     */
    public function reject(TeamOpenTrial $teamOpenTrial): RedirectResponse
    {
        $this->teamOpenTrial->update($teamOpenTrial->id, [
            'status' => StatusDiskEnum::REJECT->value
        ]);
        return redirect()->back();
    }
}
