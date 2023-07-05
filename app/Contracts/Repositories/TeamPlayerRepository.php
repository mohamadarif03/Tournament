<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TeamPlayerInterface;
use App\Models\TeamPlayer;

class TeamPlayerRepository extends BaseRepository implements TeamPlayerInterface
{
    public function __construct(TeamPlayer $teamPlayer)
    {
        $this->model = $teamPlayer;
    }

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
    public function show(mixed $id): mixed
    {
         return $this->model->query()
         ->with('team')
        ->findOrFail($id);
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
        return $this->show($id)->update($data);
    }
    
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->with('team', 'user')->get();
    }
}
