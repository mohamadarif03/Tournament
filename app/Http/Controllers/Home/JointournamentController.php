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
use App\Services\CompetitorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JointournamentController extends Controller
{
    private TeamInterface $team;
    private UserInterface $user;
    private CompetitorInterface $competitor;
    private CompetitorRegistrantService $service;
    private CompetitorService $competitorService;

    public function __construct(TeamInterface $team, CompetitorInterface $competitor, UserInterface $user, CompetitorRegistrantService $service, CompetitorService $competitorService)
    {
        $this->team = $team;
        $this->user = $user;
        $this->competitor = $competitor;
        $this->service = $service;
        $this->competitorService = $competitorService;
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
        // dd("ads");
        return view('pages.home.tournament.join-tournament', compact('tournament', 'teams', 'users'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param CompetitorRequest $request
     * @return RedirectResponse  
     */
    public function join(CompetitorRequest $competitorRequest, CompetitorRegistrantRequest $registrantRequest): RedirectResponse|array|bool
    {
        $competitorData = $this->competitorService->store($competitorRequest);
        if (is_array($competitorData)) {
            $competitor = $this->competitor->store($competitorData);
            if ($competitor) {
                $this->service->store($registrantRequest->validated(), $competitor, $registrantRequest);
                return redirect()->route('tournaments')->with('success', trans('alert.add_success'));
            }
        }
        return redirect()->back()->with('slotpenuh', 'Slot Sudah Penuh');
    }
}
