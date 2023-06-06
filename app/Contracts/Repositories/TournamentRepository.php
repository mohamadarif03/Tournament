<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TournamentInterface;
use App\Enums\UserRoleEnum;
use App\Helpers\UserHelper;
use App\Models\Tournament;
use App\Traits\Datatables\TournamentDatatable;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class TournamentRepository extends BaseRepository implements TournamentInterface
{
    use TournamentDatatable;

    public function __construct(Tournament $tournament)
    {
        $this->model = $tournament;
    }

    /**
     * Handle show method and delete data instantly from models.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        try {
            $this->show($id)->delete($id);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1451) return false;
        }

        return true;
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
            ->findOrFail($id);
    }

    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     * @throws Exception
     */
    public function get(): mixed
    {
        return $this->TournamentMockup($this->model->query()
            ->with('game'));
    }
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     * @throws Exception
     */
    public function showMore(): mixed
    {
        return $this->model->query()
            ->orderBy('created_at', 'desc')
            ->where('user_id', Auth()->id())
            ->get();
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
}
