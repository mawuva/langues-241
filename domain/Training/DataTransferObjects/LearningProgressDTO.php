<?php

namespace Domain\Training\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class LearningProgressDTO extends DataTransferObject
{
    public string|null $status;
    public string|null $course_chapter_content;
    public string|null $enrollment;
}