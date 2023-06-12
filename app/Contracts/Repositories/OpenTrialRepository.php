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

    /**
     * Handle show method and update data instantly from models.
     *
     * @param mixed $id
     * @param array $data
     *
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->update($data);
    }

}
