<?php

namespace Domain\Training\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class LanguageDTO extends DataTransferObject
{
    public string $name;
    public string|null $slug;
    public string|null $short_description;
    public string|null $description;
    public $image;
}