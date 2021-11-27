<?php

namespace Domain\Training\Services;

use App\Support\Facades\DataHelper;
use Domain\Training\Actions\SaveCourseChapterContentAction;
use Domain\Training\DataTransferObjects\CourseChapterContentDTO;
use Domain\Training\Repositories\courseChapterContentRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class courseChapterContentService
{
    /**
     * @var \Domain\Training\Repositories\CourseChapterContentRepository
     */
    protected $courseChapterContentRepository;

    /**
     * Create new service instance.
     *
     * @param \Domain\Training\Repositories\CourseChapterContentRepository $courseChapterContentRepository
     * 
     * @return void
     */
    public function __construct(CourseChapterContentRepository $courseChapterContentRepository)
    {
        $this ->courseChapterContentRepository = $courseChapterContentRepository;
    }

    /**
     * Return repository instance
     *
     * @return \Domain\Training\Repositories\CourseChapterContentRepository
     */
    public function fromRepo()
    {
        return $this->courseChapterContentRepository;
    }

    /**
     * Create new data
     *
     * @param \Domain\Training\DataTransferObjects\CourseChapterContentDTO $courseChapterContentDTO
     *
     * @return array
     */
    public function create(CourseChapterContentDTO $courseChapterContentDTO): array
    {
        $courseChapterContent = app(SaveCourseChapterContentAction::class) ->execute($courseChapterContentDTO);

        return success_response($courseChapterContent, trans('lang-resources::commons.messages.completed.creation'), Response::HTTP_CREATED);
    }

    /**
     * Get data by id
     *
     * @param int|string $id
     * @param bool $inTrashed
     * @param array $columns
     *
     * @return array
     */
    public function getById($id, $inTrashed = false, $columns = ['*']): array
    {
        $courseChapterContent = DataHelper::getEntityById($this ->courseChapterContentRepository ->model(), $id, $inTrashed, $columns);

        if (is_null($courseChapterContent)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($courseChapterContent, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.chapter_content', 1)
            ]));
        }
    }

    /**
     * Get data by field value
     *
     * @param string $field
     * @param string $value
     * @param bool $inTrashed
     * @param array $columns
     *
     * @return array
     */
    public function getByField($field, $value = null, $inTrashed = false, $columns = ['*']): array
    {
        $courseChapterContent = DataHelper::findEntityByField($this ->courseChapterContentRepository ->model(), $field, $value, $inTrashed, $columns);

        if (is_null($courseChapterContent)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($courseChapterContent, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.chapter_content', 1)
            ]));
        }
    }

    /**
     * Update data
     *
     * @param \Domain\Training\DataTransferObjects\CourseChapterContentDTO $courseChapterContentDTO
     * @param int|string $id
     *
     * @return array
     */
    public function update(CourseChapterContentDTO $courseChapterContentDTO, $id): array
    {
        $courseChapterContent = app(SaveCourseChapterContentAction::class) ->execute($courseChapterContentDTO, $id);

        return success_response($courseChapterContent, trans('lang-resources::commons.messages.completed.update'));
    }

    /**
     * Delete data
     * 
     * @param int|string $id
     * 
     * @return array
     */
    public function delete($id)
    {
        $courseChapterContent = DataHelper::getEntityById($this ->courseChapterContentRepository ->model(), $id, false, ['id']);
        $courseChapterContent ->delete();

        return success_response($courseChapterContent, trans('lang-resources::commons.messages.completed.deletion'));
    }

    /**
     * Restore account type
     * 
     * @param int|string $id
     * 
     * @return array
     */
    public function restore($id)
    {
        $courseChapterContent = DataHelper::getEntityById($this ->courseChapterContentRepository ->model(), $id, true, ['id']);
        $courseChapterContent ->restore();

        return success_response($courseChapterContent, trans('lang-resources::commons.messages.completed.restoration'));
    }

    /**
     * Delete account type permanently
     * 
     * @param int|string $id
     * 
     * @return array
     */
    public function destroy($id)
    {
        $courseChapterContent = DataHelper::getEntityById($this ->courseChapterContentRepository ->model(), $id, true, ['id']);
        
        Storage::delete([
            $courseChapterContent ->url, 
            $courseChapterContent ->url_sm, 
            $courseChapterContent ->url_md, 
            $courseChapterContent ->url_lg
        ]);
        
        $courseChapterContent ->forceDelete();

        return success_response(null, trans('lang-resources::commons.messages.completed.permanent_deletion'));
    }
}