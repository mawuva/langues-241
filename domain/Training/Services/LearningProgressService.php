<?php

namespace Domain\Training\Services;

use App\Support\Facades\DataHelper;
use Domain\Training\Actions\SaveLearningProgressAction;
use Domain\Training\DataTransferObjects\LearningProgressDTO;
use Domain\Training\Repositories\LearningProgressRepository;
use Illuminate\Http\Response;

class LearningProgressService
{
    /**
     * @var \Domain\Training\Repositories\LearningProgressRepository
     */
    protected $learningProgressRepository;

    /**
     * Create new service instance.
     *
     * @param \Domain\Training\Repositories\LearningProgressRepository $learningProgressRepository
     * 
     * @return void
     */
    public function __construct(LearningProgressRepository $learningProgressRepository)
    {
        $this ->learningProgressRepository = $learningProgressRepository;
    }

    /**
     * Return repository instance
     *
     * @return \Domain\Training\Repositories\LearningProgressRepository
     */
    public function fromRepo()
    {
        return $this->learningProgressRepository;
    }

    /**
     * Create new data
     *
     * @param \Domain\Training\DataTransferObjects\LearningProgressDTO $learningProgressDTO
     *
     * @return array
     */
    public function create(LearningProgressDTO $learningProgressDTO): array
    {
        $learningProgress = app(SaveLearningProgressAction::class) ->execute($learningProgressDTO);

        return success_response($learningProgress, trans('lang-resources::commons.messages.completed.creation'), Response::HTTP_CREATED);
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
        $learningProgress = DataHelper::getEntityById($this ->learningProgressRepository ->model(), $id, $inTrashed, $columns);

        if (is_null($learningProgress)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($learningProgress, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.learningProgress', 1)
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
        $learningProgress = DataHelper::findEntityByField($this ->learningProgressRepository ->model(), $field, $value, $inTrashed, $columns);

        if (is_null($learningProgress)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($learningProgress, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.learningProgress', 1)
            ]));
        }
    }

    /**
     * Update data
     *
     * @param \Domain\Training\DataTransferObjects\learningProgressDTO $learningProgressDTO
     * @param int|string $id
     *
     * @return array
     */
    public function update(LearningProgressDTO $learningProgressDTO, $id): array
    {
        $learningProgress = app(SaveLearningProgressAction::class) ->execute($learningProgressDTO, $id);

        return success_response($learningProgress, trans('lang-resources::commons.messages.completed.update'));
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
        $learningProgress = DataHelper::getEntityById($this ->learningProgressRepository ->model(), $id, false, ['id']);
        $learningProgress ->delete();

        return success_response($learningProgress, trans('lang-resources::commons.messages.completed.deletion'));
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
        $learningProgress = DataHelper::getEntityById($this ->learningProgressRepository ->model(), $id, true, ['id']);
        $learningProgress ->restore();

        return success_response($learningProgress, trans('lang-resources::commons.messages.completed.restoration'));
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
        $learningProgress = DataHelper::getEntityById($this ->learningProgressRepository ->model(), $id, true, ['id']);
        $learningProgress ->forceDelete();

        return success_response(null, trans('lang-resources::commons.messages.completed.permanent_deletion'));
    }
}