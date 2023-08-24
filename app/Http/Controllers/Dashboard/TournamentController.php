<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\Interfaces\CompetitorInterface;
use App\Contracts\Interfaces\GameInterface;
use App\Contracts\Interfaces\TournamentInterface;
use App\Enums\UserRoleEnum;
use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\TournamentRequest;
use App\Http\Requests\TournamentUpdateRequest;
use App\Models\Competitor;
use App\Models\Tournament;
use App\Services\TournamentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TournamentController extends Controller
{
    private TournamentInterface $tournament;
    private GameInterface $game;
    private TournamentService $service;
    private CompetitorInterface $competitor;


    public function __construct(TournamentInterface $tournament, TournamentService $service, GameInterface $game,CompetitorInterface $competitor)
    {
        $this->tournament = $tournament;
        $this->game = $game;
        $this->service = $service;
        $this->competitor =$competitor;
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
            if ($request->ajax()) return $this->tournament->get();
            return view('pages.dashboard.tournament.index');
        } else {
            $tournaments = $this->tournament->showMore();
            return view('pages.user.tournament.index', compact('tournaments'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $games = $this->game->get();
        return view('pages.dashboard.tournament.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TournamentRequest $request
     * @return RedirectResponse
     */
    public function store(TournamentRequest $request): RedirectResponse
    {
        $store = $this->service->store($request);
        $this->tournament->store($store);
        return to_route('tournament.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament)
    {
        $tourteam= $this->tournament->showTeam($tournament->id);
        // dd($tourteam);
    }
    //     return view('pages.home.tournament.tournament-detail-team', compact('tourteam'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament)
    {

        $games = $this->game->get();
        return view('pages.dashboard.tournament.edit', compact('games', 'tournament'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TournamentUpdateRequest $request, Tournament $tournament)
    {
        $store = $this->service->update($request, $tournament);

        $this->tournament->update($tournament->id, $store);
        return to_route('tournament.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament): RedirectResponse
    {
        if (!$this->tournament->delete($tournament->id)) {
            return back();
        }
        $this->service->remove($tournament->live_image_url);
        return back()->with('success', trans('alert.delete_success'));
    }
}
