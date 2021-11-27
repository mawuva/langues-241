<?php

namespace Domain\Training\Services;

use App\Support\Facades\DataHelper;
use Domain\Training\Actions\SaveGroupingAction;
use Domain\Training\DataTransferObjects\GroupingDTO;
use Domain\Training\Repositories\GroupingRepository;
use Illuminate\Http\Response;

class GroupingService
{
    /**
     * @var \Domain\Training\Repositories\GroupingRepository
     */
    protected $groupingRepository;

    /**
     * Create new service instance.
     *
     * @param \Domain\Training\Repositories\GroupingRepository $groupingRepository
     * 
     * @return void
     */
    public function __construct(GroupingRepository $groupingRepository)
    {
        $this ->groupingRepository = $groupingRepository;
    }

    /**
     * Return repository instance
     *
     * @return \Domain\Training\Repositories\GroupingRepository
     */
    public function fromRepo()
    {
        return $this->groupingRepository;
    }

    /**
     * Create new data
     *
     * @param \Domain\Training\DataTransferObjects\GroupingDTO $groupingDTO
     *
     * @return array
     */
    public function create(GroupingDTO $groupingDTO): array
    {
        $grouping = app(SaveGroupingAction::class) ->execute($groupingDTO);

        return success_response($grouping, trans('lang-resources::commons.messages.completed.creation'), Response::HTTP_CREATED);
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
        $grouping = DataHelper::getEntityById($this ->groupingRepository ->model(), $id, $inTrashed, $columns);

        if (is_null($grouping)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($grouping, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.grouping', 1)
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
        $grouping = DataHelper::findEntityByField($this ->groupingRepository ->model(), $field, $value, $inTrashed, $columns);

        if (is_null($grouping)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($grouping, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.grouping', 1)
            ]));
        }
    }

    /**
     * Update data
     *
     * @param \Domain\Training\DataTransferObjects\GroupingDTO $groupingDTO
     * @param int|string $id
     *
     * @return array
     */
    public function update(GroupingDTO $groupingDTO, $id): array
    {
        $grouping = app(SaveGroupingAction::class) ->execute($groupingDTO, $id);

        return success_response($grouping, trans('lang-resources::commons.messages.completed.update'));
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
        $grouping = DataHelper::getEntityById($this ->groupingRepository ->model(), $id, false, ['id']);
        $grouping ->delete();

        return success_response($grouping, trans('lang-resources::commons.messages.completed.deletion'));
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
        $grouping = DataHelper::getEntityById($this ->groupingRepository ->model(), $id, true, ['id']);
        $grouping ->restore();

        return success_response($grouping, trans('lang-resources::commons.messages.completed.restoration'));
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
        $grouping = DataHelper::getEntityById($this ->groupingRepository ->model(), $id, true, ['id']);
        $grouping ->forceDelete();

        return success_response(null, trans('lang-resources::commons.messages.completed.permanent_deletion'));
    }
}