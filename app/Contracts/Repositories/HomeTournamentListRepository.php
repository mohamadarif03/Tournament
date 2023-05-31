<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\HomeTournamentListInterface;
use App\Models\Tournament;
use App\Contracts\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\CursorPaginator;

class HomeTournamentListRepository extends BaseRepository implements HomeTournamentListInterface
{
    public function __construct(Tournament $tournament)
    {
        $this->model = $tournament;
    }

    public function cursorPaginate(int $perPage = 10, array $columns = ['*'], string $cursorName = 'cursor', $cursor = null, Request $request): CursorPaginator
    {
        return $this->model->query()
            ->when($request->search, function ($query) use ($request) {
                return $query->where('name', 'LIKE', '%'.$request->search.'%');
            })
            ->when($request->games, function ($query) use ($request) {
                return $query->whereIn('game_id', $request->games);
            })
            ->when($request->date, function ($query) use ($request) {
                return $query->orderBy('starter_at', 'desc');
            })
            ->when($request->price, function ($query) use ($request) {
                return $query->orderBy('starter_at', 'desc');
            })
            ->with(['user', 'game'])
            ->latest()
            ->cursorPaginate($perPage, $columns, $cursorName, $cursor);
    }
}
