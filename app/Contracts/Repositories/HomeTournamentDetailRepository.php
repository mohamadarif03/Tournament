<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\HomeGameInterface;
use App\Models\Tournament;

class HomeTournamentDetailRepository extends BaseRepository implements HomeGameInterface
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
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
