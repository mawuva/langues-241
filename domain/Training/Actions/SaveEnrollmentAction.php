<?php

namespace Domain\Training\Actions;

use App\Support\Facades\DataHelper;
use Domain\Training\DataTransferObjects\EnrollmentDTO;
use Domain\Training\Models\Enrollment;
use Illuminate\Database\Eloquent\Model;

class SaveEnrollmentAction
{
    /**
     * Execute action
     *
     * @param \Domain\Training\DataTransferObjects\EnrollmentDTO $enrollmentDTO
     * @param int|string|null $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(EnrollmentDTO $enrollmentDTO, $id = null): Model
    {
        $enrollment = DataHelper::resolveModelInstance(Enrollment::class, $id);

        $enrollment ->is_paid   = $enrollmentDTO ->is_paid;
        $enrollment ->is_paid   = ($enrollmentDTO ->is_paid !== null) ? now() : null;
        $enrollment ->user_id   = $enrollmentDTO ->user;
        $enrollment ->course_id = $enrollmentDTO ->course;

        $enrollment ->save();

        return $enrollment;
    }
}