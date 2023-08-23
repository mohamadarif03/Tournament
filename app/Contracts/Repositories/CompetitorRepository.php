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

    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id);
    }

    public function get(): mixed
    {
        return $this->model->query()
            ->with('tournament')
            ->get();
    }
}
