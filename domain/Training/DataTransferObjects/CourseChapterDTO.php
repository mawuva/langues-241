<?php

namespace Domain\Training\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CourseChapterDTO extends DataTransferObject
{
    public string $title;
    public string|null $slug;
    public string|null $description;
    public string|null $course;
    public string|null $level;
}