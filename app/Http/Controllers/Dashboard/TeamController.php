<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\Interfaces\TeamInterface;
use App\Http\Controllers\Controller;
use App\Services\TeamService;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    private TeamInterface $team;
    private TeamService $service;

    public function __construct(TeamInterface $team, TeamService $service)
    {
        $this->team = $team;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = $this->team->get();
        return view('pages.dashboard.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.team.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
