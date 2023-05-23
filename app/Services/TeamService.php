<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\GameUpdateRequest;
use App\Http\Requests\TeamRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Models\Team;
use App\Traits\UploadTrait;

class TeamService implements ShouldHandleFileUpload, CustomUploadValidation
{
    use UploadTrait;

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
    public function store(TeamRequest $request): array|bool
    {
        $data = $request->validated();

        return [
            'name' => $data['name'],
            'logo' => $request->file('logo')->store(UploadDiskEnum::TEAM->value, 'public'),
            // 'logo' => $data['logo_team'],
            'description' => $data['description'],
            'game_id' => $data['game_id'],
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param TeamUpdateReqyyest $request
     * @param Team $team
     * @return array|bool
     */

    public function update(TeamRequest $request, Team $team): array|bool
    {
        $data = $request->validated();

        $old_logo = $team->logo;

        if ($request->hasFile('logo')) {
            $this->remove($old_logo);
            $old_logo = $request->file('logo')->store(UploadDiskEnum::TEAM->value, 'public');
        }

        return [
            'name' => $data['name'],
            'logo' => $old_logo,
            'description' => $data['description'],
            'game_id' => $data['game_id'],
        ];
    }
}
