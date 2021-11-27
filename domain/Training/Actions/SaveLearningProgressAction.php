<?php

namespace Domain\Training\Actions;

use App\Support\Facades\DataHelper;
use Domain\Training\DataTransferObjects\LearningProgressDTO;
use Domain\Training\Models\LearningProgress;
use Illuminate\Database\Eloquent\Model;

class SaveLearningProgressAction
{
    /**
     * Execute action
     *
     * @param \Domain\Training\DataTransferObjects\LearningProgressDTO $learningProgressDTO
     * @param int|string|null $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(LearningProgressDTO $learningProgressDTO, $id = null): Model
    {
        $learningProgress = DataHelper::resolveModelInstance(LearningProgress::class, $id);

        $learningProgress ->status                      = $learningProgressDTO ->name;
        $learningProgress ->course_chapter_content_id   = $learningProgressDTO ->course_chapter_content;
        $learningProgress ->enrollment_id               = $learningProgressDTO ->enrollment;

        $learningProgress ->save();

        return $learningProgress;
    }
}