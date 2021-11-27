<?php

namespace Domain\Training\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CourseDTO extends DataTransferObject
{
    public string $title;
    public string|null $slug;
    public string|null $short_description;
    public string|null $description;
    public string|null $fee;
    public string|null $is_free;
    public string|null $language;
    public string|null $level;
    public string|null $grouping;
    public $image;
}