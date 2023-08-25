<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\GameRequest;
use App\Http\Requests\GameUpdateRequest;
use App\Models\Game;
use App\Traits\UploadTrait;

class GameService implements ShouldHandleFileUpload, CustomUploadValidation
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
     * @param GameRequest $request
     *
     * @return array|bool
     */
    public function store(GameRequest $request): array|bool
    {
        $data = $request->validated();
        $logo = $this->upload(UploadDiskEnum::GAME->value, $request->file('logo'));

        return [
            'name' => $data['name'],
            'logo' => $logo
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param GameUpdateRequest $request
     * @param Game $game
     * @return array|bool
     */

    public function update(GameUpdateRequest $request, Game $game): array|bool
    {
        $data = $request->validated();

        $old_logo = $game->logo;

        if ($request->hasFile('logo')) {
            $this->remove($old_logo);
            $old_logo = $this->upload(UploadDiskEnum::TEAM->value, $request->file('logo'));
        }

        return [
            'name' => $data['name'],
            'logo' => $old_logo,
        ];
    }
}
