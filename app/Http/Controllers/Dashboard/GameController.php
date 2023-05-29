<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\Interfaces\GameInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use App\Http\Requests\GameUpdateRequest;
use App\Models\Game;
use App\Services\GameService;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GameController extends Controller
{

    private GameInterface $game;
    private GameService $service;

    public function __construct(GameInterface $game, GameService $service)
    {
        $this->game = $game;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return View $request
     * 
     */
    public function index()
    {
        $games = $this->game->get();
        return view('pages.dashboard.game.index', compact('games'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.dashboard.game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GameRequest $request
     * @return RedirectResponse
     */
    public function store(GameRequest $request): RedirectResponse
    {
        $this->game->store($this->service->store($request));
        
        return to_route('game.index')->with('success', trans('alert.add_success'));
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
     *
     * @param Game $game
     * @return View
     */

     public function edit(Game $game): View
     {
         return view('pages.dashboard.game.edit', compact('game'));
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(GameUpdateRequest $request, Game $game): RedirectResponse
    {
        $store = $this->service->update($request, $game);

        $this->game->update($game->id, $store);
        return to_route('game.index')->with('success', trans('alert.update_success'));
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param Game $game
     * @return RedirectResponse
     */
    public function destroy(Game $game): RedirectResponse
    {
        if (!$this->game->delete($game->id)) {
            return back();
        }
        $this->service->remove($game->logo);
        return back(); 
    }
}
