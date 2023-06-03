<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CompetitorRegistrantInterface;
use App\Models\CompetitorRegistrant;

class CompetitorRegistrantRepository extends BaseRepository implements CompetitorRegistrantInterface
{
    public function __construct(CompetitorRegistrant $competitorRegistrant)
    {
        $this->model = $competitorRegistrant;
    }

    public function store(array $data): mixed
    {
        return $this->model->query()
        ->create($data);
    }

}
