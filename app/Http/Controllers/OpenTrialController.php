<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\OpenTrialInterface;

use App\Http\Requests\OpenTrialQuestionRequest;
use App\Http\Requests\OpenTrialRequest;
use App\Models\Team;
use App\Services\OpenTrialQuestionService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OpenTrialController extends Controller
{
    private OpenTrialInterface $openTrial;
    private OpenTrialQuestionService $service;

    public function __construct(OpenTrialInterface $openTrial, OpenTrialQuestionService $service)
    {
        $this->openTrial = $openTrial;
        $this->service = $service;
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
}
