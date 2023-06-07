<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\HomeTeamInterface;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Pagination\CursorPaginator;

class HomeTeamRepository extends BaseRepository implements HomeTeamInterface
{
    public function __construct(Team $team)
    {
        $this->model = $team;
    }

    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->with('user')
            ->take(8)->get();
    }
    /**
     * Handle get the specified data by id from models.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id);
    }
    public function cursorPaginate(int $perPage = 3, array $columns = ['*'], string $cursorName = 'cursor', $cursor = null, Request $request): CursorPaginator
    {
        return $this->model->query()
            ->when($request->search, function ($query) use ($request) {
                return $query->where('name', 'LIKE', '%' . $request->search . '%');
            })
            ->when($request->games, function ($query) use ($request) {
                return $query->whereIn('game_id', $request->games);
            })
            ->with(['user', 'game'])
            ->cursorPaginate($perPage, $columns, $cursorName, $cursor);
    }
}
