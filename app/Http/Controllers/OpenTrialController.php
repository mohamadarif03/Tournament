<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\OpenTrialInterface;
use App\Contracts\Interfaces\OpenTrialQuestionInterface;
use App\Http\Requests\OpenTrialQuestionRequest;
use App\Http\Requests\OpenTrialRequest;
use App\Models\OpenTrial;
use App\Models\OpenTrialQuestion;
use App\Models\Team;
use App\Models\TeamOpenTrial;
use App\Services\OpenTrialQuestionService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OpenTrialController extends Controller
{
    private OpenTrialInterface $openTrial;
    private OpenTrialQuestionService $service;
    private OpenTrialQuestionInterface $openTrialQuestion;

    public function __construct(OpenTrialInterface $openTrial, OpenTrialQuestionService $service, OpenTrialQuestionInterface $openTrialQuestion)
    {
        $this->openTrial = $openTrial;
        $this->service = $service;
        $this->openTrialQuestion = $openTrialQuestion;
    }
    public function create(Team $team): View
    {
        return view('pages.dashboard.team.createOpenTrial', compact('team'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param OpenTrialRequest $request
     * @return RedirectResponse
     */
    public function store(OpenTrialRequest $openTrialRequest, OpenTrialQuestionRequest $openTrialQuestionRequest): RedirectResponse
    {

        $openTrial = $this->openTrial->store($openTrialRequest->validated());

        $this->service->store($openTrialQuestionRequest->validated(), $openTrial, $openTrialQuestionRequest);

        return to_route('team.index')->with('success', trans('alert.add_success'));
    }

    public function edit(OpenTrial $openTrial): View
    {
        $openTrialQuestions = $this->openTrialQuestion->show($openTrial->id);

        return view('pages.dashboard.team.editOpenTrial', compact(['openTrial', 'openTrialQuestions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OpenTrialRequest $openTrialRequest
     * @param openTrial $openTrial
     * @return RedirectResponse
     */
    public function update(OpenTrialRequest $openTrialRequest, OpenTrial $openTrial): RedirectResponse
    {
        $this->openTrial->update($openTrial->id, $openTrialRequest->validated());

        return to_route('team.index')->with('success', trans('alert.update_success'));
    }
}
