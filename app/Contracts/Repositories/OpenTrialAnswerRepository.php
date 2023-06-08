<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\OpenTrialAnswerInterface;
use App\Models\OpenTrialAnswer;

class OpenTrialAnswerRepository extends BaseRepository implements OpenTrialAnswerInterface
{
    public function __construct(OpenTrialAnswer $openTrialAnswer)
    {
        $this->model = $openTrialAnswer;
    }

    public function get(): mixed
    {
        return $this->model->query()
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()
        ->create($data);
    }

}
