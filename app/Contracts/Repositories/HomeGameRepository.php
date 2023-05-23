<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\HomeGameInterface;
use App\Models\Game;

class HomeGameRepository extends BaseRepository implements HomeGameInterface
{
    public function __construct(Game $game)
    {
        $this->model = $game;
    }

    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->get();
    }

}
