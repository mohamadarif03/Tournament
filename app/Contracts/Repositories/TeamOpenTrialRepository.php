<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TeamOpenTrialInterface;
use App\Models\TeamOpenTrial;

class TeamOpenTrialRepository extends BaseRepository implements TeamOpenTrialInterface
{
    public function __construct(TeamOpenTrial $teamOpenTrial)
    {
        $this->model = $teamOpenTrial;
    }

    public function store(array $data): mixed
    {
        return $this->model->query()
        ->create($data);
    }
    function show(mixed $id): mixed
    {
        return $this->model->query()
        ->with('team')
        ->where('team_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();
    }

}
