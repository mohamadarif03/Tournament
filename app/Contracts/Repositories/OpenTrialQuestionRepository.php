<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\OpenTrialQuestionInterface;
use App\Models\OpenTrialQuestion;

class OpenTrialQuestionRepository extends BaseRepository implements OpenTrialQuestionInterface
{
    public function __construct(OpenTrialQuestion $openTrialQuestion)
    {
        $this->model = $openTrialQuestion;
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()
        ->with(['openTrial', 'openTrialAnswer'])
        ->where('open_trial_id', $id)
        ->orderBy('created_at', 'desc')
        ->get(); 
    }

    public function store(array $data): mixed
    {
        return $this->model->query()
        ->create($data);
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
