<?php

namespace Domain\Training\Actions;

use App\Support\Facades\DataHelper;
use Domain\Training\DataTransferObjects\CourseChapterDTO;
use Domain\Training\Models\CourseChapter;
use Illuminate\Database\Eloquent\Model;

class SaveCourseChapterAction
{
    /**
     * Execute action
     *
     * @param \Domain\Training\DataTransferObjects\CourseChapterDTO $courseChapterDTO
     * @param int|string|null $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(CourseChapterDTO $courseChapterDTO, $id = null): Model
    {
        $courseChapter = DataHelper::resolveModelInstance(CourseChapter::class, $id);

        $courseChapter ->title          = $courseChapterDTO ->title;
        $courseChapter ->slug           = ($courseChapterDTO ->slug !== null) ? $courseChapterDTO ->slug : $courseChapterDTO ->title;
        $courseChapter ->description    = $courseChapterDTO ->description;
        $courseChapter ->course_id      = ($courseChapterDTO ->course !== null) ? $courseChapterDTO ->course : null;
        $courseChapter ->level_id       = ($courseChapterDTO ->level !== null) ? $courseChapterDTO ->level : null;

        $courseChapter ->save();

        return $courseChapter;
    }
}