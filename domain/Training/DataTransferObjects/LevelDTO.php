<?php

namespace Domain\Training\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class LevelDTO extends DataTransferObject
{
    public string $name;
    public string|null $slug;
    public string|null $description;
}