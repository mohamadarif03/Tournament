<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\OpenTrialInterface;
use App\Models\OpenTrial;

class OpenTrialRepository extends BaseRepository implements OpenTrialInterface
{
    public function __construct(OpenTrial $openTrial)
    {
        $this->model = $openTrial;
    }

    public function store(array $data): mixed
    {
        return $this->model->query()
        ->create($data);
    }
    public function show(mixed $id): mixed
    {
        return $this->model->query()
        ->with(['team', 'openTrialQuestions'])
        ->where('team_id', $id)
        ->orderBy('created_at', 'desc')
        ->first();   
    }

}
