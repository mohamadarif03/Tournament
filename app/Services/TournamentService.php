<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Contracts\Interfaces\HomeTournamentListInterface;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\TournamentRequest;
use App\Http\Requests\TournamentUpdateRequest;
use App\Models\Team;
use App\Models\Tournament;
use App\Traits\UploadTrait;

class TournamentService implements ShouldHandleFileUpload, CustomUploadValidation
{
    use UploadTrait;

    private HomeTournamentListInterface $tournamentlist;


    public function __construct(HomeTournamentListInterface $tournamentlist)
    {
        $this->tournamentlist = $tournamentlist;
    }
    /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    
    /**
     * Handle store data event to models.
     *
     * @param TeamRequest $request
     *
     * @return array|bool
     */
    public function store(TournamentRequest $request): array|bool
    {
        $data = $request->validated();

        return [
            'name' => $data['name'],
            'description' => $data['description'],
            'completed_at' => $data['completed_at'],
            'slot' => $data['slot'],
            'price_pool' => $data['price_pool'],
            'game_id' => $data['game_id'],
            'starter_at' => $data['starter_at'],
            'live_image_url' => $request->file('live_image_url')->store(UploadDiskEnum::TOURNAMENT->value, 'public'),
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param TeamUpdateReqyyest $request
     * @param Team $team
     * @return array|bool
     */

    public function update(TournamentUpdateRequest $request, Tournament $tournament): array|bool
    {
        $data = $request->validated();

        $old_image = $tournament->live_image_url;

        if ($request->hasFile('live_image_url')) {
            $this->remove($old_image);
            $old_image = $request->file('live_image_url')->store(UploadDiskEnum::TOURNAMENT->value, 'public');
        }

        return [
            'name' => $data['name'],
            'description' => $data['description'],
            'completed_at' => $data['completed_at'],
            'slot' => $data['slot'],
            'price_pool' => $data['price_pool'],
            'game_id' => $data['game_id'],
            'starter_at' => $data['starter_at'],
            'live_image_url' => $old_image,
        ];
    }

    public function get()
    {
        return $this->tournamentlist->get();
    }

}
