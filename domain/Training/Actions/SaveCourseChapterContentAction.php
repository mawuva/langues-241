<?php

namespace Domain\Training\Actions;

use App\Support\Facades\DataHelper;
use App\Support\Facades\HandleFileUpload;
use Domain\Training\DataTransferObjects\CourseChapterContentDTO;
use Domain\Training\Models\CourseChapterContent;
use Illuminate\Database\Eloquent\Model;

class SaveCourseChapterContentAction
{
    /**
     * Execute action
     *
     * @param \Domain\Training\DataTransferObjects\CourseChapterContentDTO $courseChapterContentDTO
     * @param int|string|null $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(CourseChapterContentDTO $courseChapterContentDTO, $id = null): Model
    {
        $courseChapterContent = DataHelper::resolveModelInstance(CourseChapterContent::class, $id);

        $courseChapterContent ->title               = $courseChapterContentDTO ->title;
        $courseChapterContent ->slug                = ($courseChapterContentDTO ->slug !== null) ? $courseChapterContentDTO ->slug : $courseChapterContentDTO ->title;
        $courseChapterContent ->description         = $courseChapterContentDTO ->description;
        $courseChapterContent ->is_mandatory        = ($courseChapterContentDTO ->is_mandatory !== null) ? $courseChapterContentDTO ->is_mandatory : null;
        $courseChapterContent ->is_open_for_free    = ($courseChapterContentDTO ->is_open_for_free !== null) ? $courseChapterContentDTO ->is_open_for_free : null;
        $courseChapterContent ->course_chapter_id   = ($courseChapterContentDTO ->course_chapter !== null) ? $courseChapterContentDTO ->course_chapter : null;
        $courseChapterContent ->content_type_id     = ($courseChapterContentDTO ->content_type !== null) ? $courseChapterContentDTO ->content_type : null;

        if ($courseChapterContentDTO ->file !== null) {
            $info = HandleFileUpload::execute($courseChapterContentDTO ->file, 'course-chapter-contents');

            $courseChapterContent->original_filename    = $info['original_filename'];
            $courseChapterContent->filename             = $info['filename'];
            $courseChapterContent->mime                 = $info['mime'];
            $courseChapterContent->url                  = $info['url'];
            $courseChapterContent->url_sm               = ($info['sm_thumb_url'] !== null) ? $info['sm_thumb_url'] : null;
            $courseChapterContent->url_md               = ($info['md_thumb_url'] !== null) ? $info['md_thumb_url'] : null;
            $courseChapterContent->url_lg               = ($info['lg_thumb_url'] !== null) ? $info['lg_thumb_url'] : null;
        }

        $courseChapterContent ->save();

        return $courseChapterContent;
    }
}