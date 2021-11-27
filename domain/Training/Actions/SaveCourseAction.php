<?php

namespace Domain\Training\Actions;

use App\Actions\HandleImageSavingAction;
use App\Support\Facades\DataHelper;
use Domain\Training\DataTransferObjects\CourseDTO;
use Domain\Training\Models\Course;
use Illuminate\Database\Eloquent\Model;

class SaveCourseAction
{
    /**
     * Execute action
     *
     * @param \Domain\Training\DataTransferObjects\CourseDTO $courseDTO
     * @param int|string|null $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(CourseDTO $courseDTO, $id = null): Model
    {
        $course = DataHelper::resolveModelInstance(Course::class, $id);
        
        $course ->title                 = $courseDTO ->title;
        $course ->slug                  = ($courseDTO ->slug !== null) ? $courseDTO ->slug : $courseDTO ->title;
        $course ->short_description     = $courseDTO ->short_description;
        $course ->description           = $courseDTO ->description;
        $course ->fee                   = ($courseDTO ->fee !== null) ? $courseDTO ->fee : null;
        $course ->is_free               = ($courseDTO ->is_free !== null) ? $courseDTO ->is_free : null;
        $course ->language_id           = ($courseDTO ->language !== null) ? $courseDTO ->language : null;
        $course ->level_id              = ($courseDTO ->level !== null) ? $courseDTO ->level : null;
        $course ->grouping_id           = ($courseDTO ->grouping !== null) ? $courseDTO ->grouping : null;

        $course ->save();

        if ($courseDTO ->image !== null)
            app(HandleImageSavingAction::class) ->execute($course, $courseDTO ->image, 'courses');

        return $course;
    }
}