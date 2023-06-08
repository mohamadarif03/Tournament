<?php

namespace App\Services;

use App\Contracts\Interfaces\CompetitorRegistrantInterface;
use App\Contracts\Interfaces\HomeTeamInterface;
use App\Contracts\Interfaces\OpenTrialAnswerInterface;
use App\Http\Requests\OpenTrialAnswerRequest;
use App\Traits\UploadTrait;

class OpenTrialAnswerService
{
    use UploadTrait;
    
    private OpenTrialAnswerInterface $openTrialAnswer;


    public function __construct(OpenTrialAnswerInterface $openTrialAnswer)
    {
        $this->openTrialAnswer = $openTrialAnswer;
    }


    /**
     * Handle store data event to models.
     *
     * @param OpenTrialAnswerRequest $request
     *
     * @return array|bool
     */

    public function store(array $data, OpenTrialAnswerRequest $request): void
    {

        foreach ($request->answer as $value) {
            $data['answer'] = $value;
        }
        foreach ($request->open_trial_question_id as $value) {
            $data['open_trial_question_id'] = $value;
        }

        $this->openTrialAnswer->store($data);
    }
}
