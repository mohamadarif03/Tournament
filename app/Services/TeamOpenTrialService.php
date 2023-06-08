<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\TeamOpenTrialRequest;
use App\Traits\UploadTrait;

class TeamOpenTrialService implements ShouldHandleFileUpload, CustomUploadValidation
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
     * @param TeamOpenTrialRequest $request
     *
     * @return array|bool
     */
    public function store(TeamOpenTrialRequest $request): array|bool
    {
        $data = $request->validated();

        return [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'cv' => $request->file('cv')->store(UploadDiskEnum::CV->value, 'public'),
        ];
    }
}
