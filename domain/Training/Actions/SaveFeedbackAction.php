<?php

namespace Domain\Training\Actions;

use App\Support\Facades\DataHelper;
use Domain\Training\DataTransferObjects\FeedbackDTO;
use Domain\Training\Models\Feedback;
use Illuminate\Database\Eloquent\Model;

class SaveFeedbackAction
{
    /**
     * Execute action
     *
     * @param \Domain\Training\DataTransferObjects\FeedbackDTO $feedbackDTO
     * @param int|string|null $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(FeedbackDTO $feedbackDTO, $id = null): Model
    {
        $feedback = DataHelper::resolveModelInstance(Feedback::class, $id);

        $feedback ->rating_score    = $feedbackDTO ->rating_score;
        $feedback ->feedback_text   = $feedbackDTO ->feedback_text;
        $feedback ->user_id         = $feedbackDTO ->user;
        $feedback ->enrollment_id   = $feedbackDTO ->enrollment;

        $feedback ->save();

        return $feedback;
    }
}