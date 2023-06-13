<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TeamOpenTrialInterface;
use App\Models\TeamOpenTrial;

class TeamOpenTrialRepository extends BaseRepository implements TeamOpenTrialInterface
{
    public function __construct(TeamOpenTrial $teamOpenTrial)
    {
        $this->model = $teamOpenTrial;
    }

    /**
     * Handle store data event to models.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
        ->create($data);
    }
    /**
     * Handle get the specified data by id from models.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    function show(mixed $id): mixed
    {
        return $this->model->query()
        ->with('team')
        ->where('team_id', $id)
        ->where('status', 'pending')
        ->orderBy('created_at', 'desc')
        ->get();
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
