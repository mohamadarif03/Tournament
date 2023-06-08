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

    public function store(array $data): mixed
    {
        return $this->model->query()
        ->create($data);
    }

}
