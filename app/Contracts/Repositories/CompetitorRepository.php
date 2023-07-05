<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CompetitorInterface;
use App\Models\Competitor;
use App\Models\Tournament;

class CompetitorRepository extends BaseRepository implements CompetitorInterface
{
    public function __construct(Competitor $competitor)
    {
        $this->model = $competitor;
    }

    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

}
