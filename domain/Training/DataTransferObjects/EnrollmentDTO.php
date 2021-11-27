<?php

namespace Domain\Training\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class EnrollmentDTO extends DataTransferObject
{
    public string|null $is_paid;
    public string|null $user;
    public string|null $course;
}