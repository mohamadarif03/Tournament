<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TeamPlayerInterface;
use App\Models\TeamPlayer;

class TeamPlayerRepository extends BaseRepository implements TeamPlayerInterface
{
    public function __construct(TeamPlayer $teamPlayer)
    {
        $this->model = $teamPlayer;
    }

    public function store(array $data): mixed
    {
        return $this->model->query()
        ->create($data);
    }

}
