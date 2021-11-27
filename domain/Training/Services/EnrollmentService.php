<?php

namespace Domain\Training\Services;

use App\Support\Facades\DataHelper;
use Domain\Training\Actions\SaveEnrollmentAction;
use Domain\Training\DataTransferObjects\EnrollmentDTO;
use Domain\Training\Repositories\EnrollmentRepository;
use Illuminate\Http\Response;

class EnrollmentService
{
    /**
     * @var \Domain\Training\Repositories\EnrollmentRepository
     */
    protected $enrollmentRepository;

    /**
     * Create new service instance.
     *
     * @param \Domain\Training\Repositories\EnrollmentRepository $enrollmentRepository
     * 
     * @return void
     */
    public function __construct(EnrollmentRepository $enrollmentRepository)
    {
        $this ->enrollmentRepository = $enrollmentRepository;
    }

    /**
     * Return repository instance
     *
     * @return \Domain\Training\Repositories\EnrollmentRepository
     */
    public function fromRepo()
    {
        return $this->enrollmentRepository;
    }

    /**
     * Create new data
     *
     * @param \Domain\Training\DataTransferObjects\EnrollmentDTO $enrollmentDTO
     *
     * @return array
     */
    public function create(EnrollmentDTO $enrollmentDTO): array
    {
        $enrollment = app(SaveEnrollmentAction::class) ->execute($enrollmentDTO);

        return success_response($enrollment, trans('lang-resources::commons.messages.completed.creation'), Response::HTTP_CREATED);
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
        $enrollment = DataHelper::getEntityById($this ->enrollmentRepository ->model(), $id, $inTrashed, $columns);

        if (is_null($enrollment)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($enrollment, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.enrollment', 1)
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
        $enrollment = DataHelper::findEntityByField($this ->enrollmentRepository ->model(), $field, $value, $inTrashed, $columns);

        if (is_null($enrollment)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($enrollment, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.enrollment', 1)
            ]));
        }
    }

    /**
     * Update data
     *
     * @param \Domain\Training\DataTransferObjects\EnrollmentDTO $enrollmentDTO
     * @param int|string $id
     *
     * @return array
     */
    public function update(EnrollmentDTO $enrollmentDTO, $id): array
    {
        $enrollment = app(SaveEnrollmentAction::class) ->execute($enrollmentDTO, $id);

        return success_response($enrollment, trans('lang-resources::commons.messages.completed.update'));
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
        $enrollment = DataHelper::getEntityById($this ->enrollmentRepository ->model(), $id, false, ['id']);
        $enrollment ->delete();

        return success_response($enrollment, trans('lang-resources::commons.messages.completed.deletion'));
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
        $enrollment = DataHelper::getEntityById($this ->enrollmentRepository ->model(), $id, true, ['id']);
        $enrollment ->restore();

        return success_response($enrollment, trans('lang-resources::commons.messages.completed.restoration'));
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
        $enrollment = DataHelper::getEntityById($this ->enrollmentRepository ->model(), $id, true, ['id']);
        $enrollment ->forceDelete();

        return success_response(null, trans('lang-resources::commons.messages.completed.permanent_deletion'));
    }
}