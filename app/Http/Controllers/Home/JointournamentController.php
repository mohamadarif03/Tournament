<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Interfaces\CompetitorInterface;
use App\Contracts\Interfaces\CompetitorRegistrantInterface;
use App\Contracts\Interfaces\TeamInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompetitorRegistrantRequest;
use App\Http\Requests\CompetitorRequest;
use App\Models\Tournament;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JointournamentController extends Controller
{
    private TeamInterface $team;
    private UserInterface $user;
    private CompetitorInterface $competitor;
    private CompetitorRegistrantInterface $competitorregistrant;

    public function __construct(TeamInterface $team, CompetitorInterface $competitor, CompetitorRegistrantInterface $competitorregistrant, UserInterface $user)
    {
        $this->team = $team;
        $this->user = $user;
        $this->competitor = $competitor;
        $this->competitorregistrant = $competitorregistrant;
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Tournament $tournament): View
    {
        $teams = $this->team->showmore();
        $users = $this->user->get();
        return view('pages.home.join-tournament', compact('tournament', 'teams', 'users'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param CompetitorRequest $request
     * @return RedirectResponse
     */
    public function join(CompetitorRequest $competitorRequest, CompetitorRegistrantRequest $registrantRequest): RedirectResponse
    {
        $this->competitor->store($competitorRequest->validated());
        $this->competitorregistrant->store($registrantRequest->validated());
        return redirect()->route('tournaments')->with('success', trans('alert.add_success'));
    }
}
