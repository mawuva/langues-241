<?php

namespace Domain\Training\Services;

use App\Support\Facades\DataHelper;
use Domain\Training\Actions\SaveCourseAction;
use Domain\Training\DataTransferObjects\CourseDTO;
use Domain\Training\Repositories\CourseRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CourseService
{
    /**
     * @var \Domain\Training\Repositories\CourseRepository
     */
    protected $courseRepository;

    /**
     * Create new service instance.
     *
     * @param \Domain\Training\Repositories\CourseRepository $courseRepository
     * 
     * @return void
     */
    public function __construct(CourseRepository $courseRepository)
    {
        $this ->courseRepository = $courseRepository;
    }

    /**
     * Return repository instance
     *
     * @return \Domain\Training\Repositories\courseRepository
     */
    public function fromRepo()
    {
        return $this->courseRepository;
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
        $courses = $this->courseRepository
                                ->getDatasQueryBuilder(false, null, $relations)
                                ->where($field, '=', $value)
                                ->get($columns);

        if ($courses ->count() > 0) {
            return success_response($courses);
        }

        else {
            return failure_response();
        }
    }

    /**
     * Create new data
     *
     * @param \Domain\Training\DataTransferObjects\courseDTO $courseDTO
     *
     * @return array
     */
    public function create(courseDTO $courseDTO): array
    {
        $course = app(SaveCourseAction::class) ->execute($courseDTO);

        return success_response($course, trans('lang-resources::commons.messages.completed.creation'), Response::HTTP_CREATED);
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
        $course = DataHelper::getEntityById($this ->courseRepository ->model(), $id, $inTrashed, $columns);

        if (is_null($course)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($course, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.course', 1)
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
        $course = DataHelper::findEntityByField($this ->courseRepository ->model(), $field, $value, $inTrashed, $columns);

        if (is_null($course)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($course, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.course', 1)
            ]));
        }
    }

    /**
     * Update data
     *
     * @param \Domain\Training\DataTransferObjects\CourseDTO $courseDTO
     * @param int|string $id
     *
     * @return array
     */
    public function update(CourseDTO $courseDTO, $id): array
    {
        $course = app(SaveCourseAction::class) ->execute($courseDTO, $id);

        return success_response($course, trans('lang-resources::commons.messages.completed.update'));
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
        $course = DataHelper::getEntityById($this ->courseRepository ->model(), $id, false, ['id']);
        $course ->delete();

        return success_response($course, trans('lang-resources::commons.messages.completed.deletion'));
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
        $course = DataHelper::getEntityById($this ->courseRepository ->model(), $id, true, ['id']);
        $course ->restore();

        return success_response($course, trans('lang-resources::commons.messages.completed.restoration'));
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
        $course = DataHelper::getEntityById($this ->courseRepository ->model(), $id, true, ['id']);
        $course ->image ->delete();
        
        Storage::delete([
            $course ->image ->url, 
            $course ->image ->url_sm, 
            $course ->image ->url_md, 
            $course ->image ->url_lg
        ]);
        
        $course ->forceDelete();

        return success_response(null, trans('lang-resources::commons.messages.completed.permanent_deletion'));
    }
}