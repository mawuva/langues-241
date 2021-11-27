<?php

namespace Domain\Training\Services;

use App\Support\Facades\DataHelper;
use Domain\Training\Actions\SaveFeedbackAction;
use Domain\Training\DataTransferObjects\FeedbackDTO;
use Domain\Training\Repositories\FeedbackRepository;
use Illuminate\Http\Response;

class FeedbackService
{
    /**
     * @var \Domain\Training\Repositories\FeedbackRepository
     */
    protected $feedbackRepository;

    /**
     * Create new service instance.
     *
     * @param \Domain\Training\Repositories\FeedbackRepository $feedbackRepository
     * 
     * @return void
     */
    public function __construct(FeedbackRepository $feedbackRepository)
    {
        $this ->feedbackRepository = $feedbackRepository;
    }

    /**
     * Return repository instance
     *
     * @return \Domain\Training\Repositories\FeedbackRepository
     */
    public function fromRepo()
    {
        return $this->feedbackRepository;
    }

    /**
     * Create new data
     *
     * @param \Domain\Training\DataTransferObjects\FeedbackDTO $feedbackDTO
     *
     * @return array
     */
    public function create(FeedbackDTO $feedbackDTO): array
    {
        $feedback = app(SaveFeedbackAction::class) ->execute($feedbackDTO);

        return success_response($feedback, trans('lang-resources::commons.messages.completed.creation'), Response::HTTP_CREATED);
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
        $feedback = DataHelper::getEntityById($this ->feedbackRepository ->model(), $id, $inTrashed, $columns);

        if (is_null($feedback)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($feedback, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.feedback', 1)
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
        $feedback = DataHelper::findEntityByField($this ->feedbackRepository ->model(), $field, $value, $inTrashed, $columns);

        if (is_null($feedback)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($feedback, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.feedback', 1)
            ]));
        }
    }

    /**
     * Update data
     *
     * @param \Domain\Training\DataTransferObjects\FeedbackDTO $feedbackDTO
     * @param int|string $id
     *
     * @return array
     */
    public function update(FeedbackDTO $feedbackDTO, $id): array
    {
        $feedback = app(SaveFeedbackAction::class) ->execute($feedbackDTO, $id);

        return success_response($feedback, trans('lang-resources::commons.messages.completed.update'));
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
        $feedback = DataHelper::getEntityById($this ->feedbackRepository ->model(), $id, false, ['id']);
        $feedback ->delete();

        return success_response($feedback, trans('lang-resources::commons.messages.completed.deletion'));
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
        $feedback = DataHelper::getEntityById($this ->feedbackRepository ->model(), $id, true, ['id']);
        $feedback ->restore();

        return success_response($feedback, trans('lang-resources::commons.messages.completed.restoration'));
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
        $feedback = DataHelper::getEntityById($this ->feedbackRepository ->model(), $id, true, ['id']);
        $feedback ->forceDelete();

        return success_response(null, trans('lang-resources::commons.messages.completed.permanent_deletion'));
    }
}