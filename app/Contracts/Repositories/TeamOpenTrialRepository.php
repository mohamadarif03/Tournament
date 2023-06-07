<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TeamOpenTrialInterface;
use App\Models\TeamOpenTrial;

class TeamOpenTrialRepository extends BaseRepository implements TeamOpenTrialInterface
{
    public function __construct(TeamOpenTrial $teamopentrial)
    {
        $this->model = $teamopentrial;
    }

    public function store(array $data): mixed
    {
        return $this->model->query()
        ->create($data);
    }

}
