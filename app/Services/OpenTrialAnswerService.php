<?php

namespace App\Services;

use App\Contracts\Interfaces\OpenTrialAnswerInterface;
use App\Http\Requests\OpenTrialAnswerRequest;
use App\Http\Requests\TeamOpenTrialRequest;
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

    public function store(array $data, TeamOpenTrialRequest $request): void
    {
        $answers = $request->answer;
        $questionIds = $request->open_trial_question_id;

        $count = min(count($answers), count($questionIds));

        for ($i = 0; $i < $count; $i++) {
            $answer = $answers[$i];
            $open_trial_question_id = $questionIds[$i];

            $data['answer'] = $answer;
            $data['open_trial_question_id'] = $open_trial_question_id;

            $this->openTrialAnswer->store($data);
        }
    }
}
