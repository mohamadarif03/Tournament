<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\HomeTeamInterface;
use App\Models\Team;

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

}
