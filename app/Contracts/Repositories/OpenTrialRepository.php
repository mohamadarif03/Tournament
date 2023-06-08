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
    public function get(): mixed
    {
        return $this->model->query()
        ->orderBy('created_at', 'desc')
        ->get();
    }

}
