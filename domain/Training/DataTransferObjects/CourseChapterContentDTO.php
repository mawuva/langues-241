<?php

namespace Domain\Training\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CourseChapterContentDTO extends DataTransferObject
{
    public string|null $title;
    public string|null $slug;
    public string|null $description;
    public string|null $is_mandatory;
    public string|null $is_open_for_free;
    public string|null $course_chapter;
    public string|null $content_type;
    public $file;
}