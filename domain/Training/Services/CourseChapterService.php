<?php

namespace Domain\Training\Services;

use App\Support\Facades\DataHelper;
use Domain\Training\Actions\SaveCourseChapterAction;
use Domain\Training\DataTransferObjects\CourseChapterDTO;
use Domain\Training\Repositories\CourseChapterRepository;
use Illuminate\Http\Response;

class CourseChapterService
{
    /**
     * @var \Domain\Training\Repositories\CourseChapterRepository
     */
    protected $courseChapterRepository;

    /**
     * Create new service instance.
     *
     * @param \Domain\Training\Repositories\CourseChapterRepository $courseChapterRepository
     * 
     * @return void
     */
    public function __construct(CourseChapterRepository $courseChapterRepository)
    {
        $this ->courseChapterRepository = $courseChapterRepository;
    }

    /**
     * Return repository instance
     *
     * @return \Domain\Training\Repositories\CourseChapterRepository
     */
    public function fromRepo()
    {
        return $this->courseChapterRepository;
    }

    /**
     * Get records by field value
     *
     * @param string $field
     * @param string $value
     * @param bool $inTrashed
     * @param array $columns
     * @param array $relations
     *
     * @return array
     */
    public function getRecordsByFieldValue($field, $value = null, $inTrashed = false, $columns = ['*'], $relations = []): array
    {
        $courseChapters = $this->courseChapterRepository
                                ->getDatasQueryBuilder(false, null, $relations)
                                ->where($field, '=', $value)
                                ->get($columns);

        if ($courseChapters ->count() > 0) {
            return success_response($courseChapters);
        }

        else {
            return failure_response();
        }
    }

    /**
     * Get records by field value
     *
     * @param string $field
     * @param string $value
     * @param bool $inTrashed
     * @param array $columns
     * @param array $relations
     *
     * @return array
     */
    public function getTrashedRecordsByFieldValue($field, $value = null, $columns = ['*'], $relations = []): array
    {
        $courseChapters = $this->courseChapterRepository
                                ->getDatasQueryBuilder(false, null, $relations)
                                ->onlyTrashed()
                                ->where($field, '=', $value)
                                ->get($columns);

        if ($courseChapters ->count() > 0) {
            return success_response($courseChapters);
        }

        else {
            return failure_response();
        }
    }

    /**
     * Create new data
     *
     * @param \Domain\Training\DataTransferObjects\CourseChapterDTO $courseChapterDTO
     *
     * @return array
     */
    public function create(CourseChapterDTO $courseChapterDTO): array
    {
        $courseChapter = app(SaveCourseChapterAction::class) ->execute($courseChapterDTO);

        return success_response($courseChapter, trans('lang-resources::commons.messages.completed.creation'), Response::HTTP_CREATED);
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
        $courseChapter = DataHelper::getEntityById($this ->courseChapterRepository ->model(), $id, $inTrashed, $columns);

        if (is_null($courseChapter)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($courseChapter, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.chapter', 1)
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
        $courseChapter = DataHelper::findEntityByField($this ->courseChapterRepository ->model(), $field, $value, $inTrashed, $columns);

        if (is_null($courseChapter)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($courseChapter, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.chapter', 1)
            ]));
        }
    }

    /**
     * Update data
     *
     * @param \Domain\Training\DataTransferObjects\CourseChapterDTO $courseChapterDTO
     * @param int|string $id
     *
     * @return array
     */
    public function update(CourseChapterDTO $courseChapterDTO, $id): array
    {
        $courseChapter = app(SaveCourseChapterAction::class) ->execute($courseChapterDTO, $id);

        return success_response($courseChapter, trans('lang-resources::commons.messages.completed.update'));
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
        $courseChapter = DataHelper::getEntityById($this ->courseChapterRepository ->model(), $id, false, ['id']);
        $courseChapter ->delete();

        return success_response($courseChapter, trans('lang-resources::commons.messages.completed.deletion'));
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
        $courseChapter = DataHelper::getEntityById($this ->courseChapterRepository ->model(), $id, true, ['id']);
        $courseChapter ->restore();

        return success_response($courseChapter, trans('lang-resources::commons.messages.completed.restoration'));
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
        $courseChapter = DataHelper::getEntityById($this ->courseChapterRepository ->model(), $id, true, ['id']);
        $courseChapter ->forceDelete();

        return success_response(null, trans('lang-resources::commons.messages.completed.permanent_deletion'));
    }
}