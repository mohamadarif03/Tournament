<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Contracts\Interfaces\HomeTeamInterface;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\TeamRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Models\Team;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Pagination\Cursor;

class TeamService implements ShouldHandleFileUpload, CustomUploadValidation
{
    use UploadTrait;
    private HomeTeamInterface $team;


    public function __construct(HomeTeamInterface $team)
    {
        $this->team = $team;    
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
    public function store(TeamRequest $request): array|bool
    {
        $data = $request->validated();

        // $folderName = Auth()->id();
        // $folderPath = public_path('storage/' . UploadDiskEnum::TEAM->value . '/' . $folderName);
        // if (!file_exists($folderPath)) {
        //     mkdir($folderPath, 0777, true);
        // }
        $logo = $this->upload(UploadDiskEnum::TEAM->value, $request->file('logo'));

        return [
            'name' => $data['name'],
            'logo' => $logo,
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

    public function update(TeamUpdateRequest $request, Team $team): array|bool
    {
        $data = $request->validated();

        $old_logo = $team->logo;

        if ($request->hasFile('logo')) {
            $this->remove($old_logo);
            $old_logo = $this->upload(UploadDiskEnum::TEAM->value, $request->file('logo'));
        }

        // if ($request->hasFile('logo')) {
        //     $this->remove($old_logo);
        //     $old_logo = $request->file('logo')->storeAs(
        //         UploadDiskEnum::TEAM->value . '/' . $folderName,
        //         $request->file('logo')->getClientOriginalName(),
        //         'public'
        //     );
        // }

        return [
            'name' => $data['name'],
            'logo' => $old_logo,
            'description' => $data['description'],
            'game_id' => $data['game_id'],
        ];
    }

    public function HandleTeamFilter(Request $request): array
    {
        $nextCursor = $request->query('nextCursor') ? Cursor::fromEncoded($request->query('nextCursor')) : null;

        $teams = $this->team->cursorPaginate(15, ['*'], 'cursor', $nextCursor, $request);

        if ($teams->hasMorePages()) $nextCursor = $teams->nextCursor()->encode();

        return [
            'teams' => $teams,
            'nextCursor' => $nextCursor
        ];
    }
}
