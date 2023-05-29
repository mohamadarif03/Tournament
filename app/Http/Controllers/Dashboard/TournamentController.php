<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\Interfaces\TournamentInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\TournamentRequest;
use App\Http\Requests\TournamentUpdateRequest;
use App\Models\Tournament;
use App\Services\TournamentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TournamentController extends Controller
{
    private TournamentInterface $tournament;
    private TournamentService $service;


    public function __construct(TournamentInterface $tournament, TournamentService $service)
    {
        $this->tournament = $tournament;    
        $this->service = $service;    
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) return $this->tournament->get();
        return view('pages.dashboard.tournament.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.tournament.create');
    }

    /**
     * Store a newly created resource in storage.
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament)
    {
        $datetime = $tournament->completed_at;
        $date = substr($datetime, 0, 10);
        return view('pages.dashboard.tournament.edit', compact('tournament', 'date'));
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
        return back(); 
    }
}
