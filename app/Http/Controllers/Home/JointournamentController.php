<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Interfaces\CompetitorInterface;
use App\Contracts\Interfaces\TeamInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompetitorRegistrantRequest;
use App\Http\Requests\CompetitorRequest;
use App\Models\Tournament;
use App\Services\CompetitorRegistrantService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JointournamentController extends Controller
{
    private TeamInterface $team;
    private UserInterface $user;
    private CompetitorInterface $competitor;
    private CompetitorRegistrantService $service;

    public function __construct(TeamInterface $team, CompetitorInterface $competitor, UserInterface $user, CompetitorRegistrantService $service)
    {
        $this->team = $team;
        $this->user = $user;
        $this->competitor = $competitor;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Tournament $tournament): View
    {
        $teams = $this->team->showMore();
        $users = $this->user->get();
        return view('pages.home.tournament.join-tournament', compact('tournament', 'teams', 'users'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param CompetitorRequest $request
     * @return RedirectResponse  
     */
    public function join(CompetitorRequest $competitorRequest, CompetitorRegistrantRequest $registrantRequest): RedirectResponse
    {
        $competitor = $this->competitor->store($competitorRequest->validated());

        $this->service->store($registrantRequest->validated(), $competitor, $registrantRequest);

        return redirect()->route('tournaments')->with('success', trans('alert.add_success'));
    }
}
