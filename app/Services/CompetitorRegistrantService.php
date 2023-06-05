<?php

namespace App\Services;

use App\Contracts\Interfaces\CompetitorRegistrantInterface;
use App\Contracts\Interfaces\HomeTeamInterface;
use App\Enums\PlayerPositionEnum;
use App\Http\Requests\CompetitorRegistrantRequest;
use App\Traits\UploadTrait;

class CompetitorRegistrantService
{
    use UploadTrait;
    private HomeTeamInterface $team;
    private CompetitorRegistrantInterface $competitorRegistrant;


    public function __construct(HomeTeamInterface $team, CompetitorRegistrantInterface $competitorRegistrant)
    {
        $this->team = $team;
        $this->competitorRegistrant = $competitorRegistrant;
    }


    /**
     * Handle store data event to models.
     *
     * @param CompetitorRegistrantRequest $request
     *
     * @return array|bool
     */

    public function store(array $data, object $competitor, CompetitorRegistrantRequest $request): void
    {

        foreach ($request->user_id as $index => $value) {
            $data['competitor_id'] = $competitor->id;
            $data['user_id'] = $value;

            $data['position'] = match ($index) {
                0 => PlayerPositionEnum::CAPTAIN->value,
                5, 6, 7, 8, 9 => PlayerPositionEnum::SUBSTITUTE->value,
                default => PlayerPositionEnum::PLAYER->value,
            };

            $this->competitorRegistrant->store($data);
        }
    }
}
