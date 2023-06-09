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

}
