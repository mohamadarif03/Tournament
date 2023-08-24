<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Http\Requests\CompetitorRequest;
use Exception;
use App\Models\Tournament;
use App\Traits\UploadTrait;

class CompetitorService implements ShouldHandleFileUpload, CustomUploadValidation
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
     * @param CompetitorRequest $request
     *
     * @return array|bool
     */
    public function store(CompetitorRequest $request): array|bool
    {
        $data = $request->validated();

        $tournamentId = $data['tournament_id'];
        $tournament = Tournament::withCount('competitors')->findOrFail($tournamentId);
        if ($tournament->competitor_count >= $tournament->slot) {
            return false;
        } else {
            return [
                'tournament_id' => $data['tournament_id'],
                'team_id' => $data['team_id'],
            ];
        }
    }
}
