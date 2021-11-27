<?php

namespace Domain\Training\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class FeedbackDTO extends DataTransferObject
{
    public string|null $rating_score;
    public string|null $feedback_text;
    public string|null $user;
    public string|null $enrollment;
}