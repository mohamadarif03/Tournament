<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\HomeTournamentListInterface;
use App\Models\Tournament;

class HomeTournamentListRepository extends BaseRepository implements HomeTournamentListInterface
{
    public function __construct(Tournament $tournament)
    {
        $this->model = $tournament;
    }

    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->orderBy('created_at','desc')
            ->with(['user','game'])
            ->get();
    }
}
