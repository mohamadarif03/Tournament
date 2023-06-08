<?php

namespace App\Services;

use App\Contracts\Interfaces\OpenTrialQuestionInterface;
use App\Http\Requests\OpenTrialQuestionRequest;
use App\Traits\UploadTrait;

class OpenTrialQuestionService
{
    use UploadTrait;
    private OpenTrialQuestionInterface $openTrialQuestion;


    public function __construct(OpenTrialQuestionInterface $openTrialQuestion)
    {
        $this->openTrialQuestion = $openTrialQuestion;
    }
    /**
     * Handle store data event to models.
     *
     * @param OpenTrialQuestionRequest $request
     *
     * @return array|bool
     */

    public function store(array $data, object $openTrial, OpenTrialQuestionRequest $request): void
    {

        foreach ($request->question as $index) {
            $data['question'] = $index;
            $data['open_trial_id'] = $openTrial->id;

            $this->openTrialQuestion->store($data);
        }
    }
}
