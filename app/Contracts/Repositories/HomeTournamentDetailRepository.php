<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\HomeTournamentDetailInterface;
use App\Models\Tournament;

class HomeTournamentDetailRepository extends BaseRepository implements HomeTournamentDetailInterface
{
    public function __construct(Tournament $tournament)
    {
        $this->model = $tournament;
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
    public function showmore(): mixed
    {
        return $this->model->query()
        ->get();
    }
}
