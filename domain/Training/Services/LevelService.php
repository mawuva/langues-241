<?php

namespace Domain\Training\Services;

use App\Support\Facades\DataHelper;
use Domain\Training\Actions\SaveLevelAction;
use Domain\Training\DataTransferObjects\LevelDTO;
use Domain\Training\Repositories\LevelRepository;
use Illuminate\Http\Response;

class LevelService
{
    /**
     * @var \Domain\Training\Repositories\LevelRepository
     */
    protected $levelRepository;

    /**
     * Create new service instance.
     *
     * @param \Domain\Training\Repositories\LevelRepository $levelRepository
     * 
     * @return void
     */
    public function __construct(LevelRepository $levelRepository)
    {
        $this ->levelRepository = $levelRepository;
    }

    /**
     * Return repository instance
     *
     * @return \Domain\Training\Repositories\LevelRepository
     */
    public function fromRepo()
    {
        return $this->levelRepository;
    }

    /**
     * Create new data
     *
     * @param \Domain\Training\DataTransferObjects\LevelDTO $levelDTO
     *
     * @return array
     */
    public function create(LevelDTO $levelDTO): array
    {
        $level = app(SaveLevelAction::class) ->execute($levelDTO);

        return success_response($level, trans('lang-resources::commons.messages.completed.creation'), Response::HTTP_CREATED);
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
        $level = DataHelper::getEntityById($this ->levelRepository ->model(), $id, $inTrashed, $columns);

        if (is_null($level)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($level, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.level', 1)
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
        $level = DataHelper::findEntityByField($this ->levelRepository ->model(), $field, $value, $inTrashed, $columns);

        if (is_null($level)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($level, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.level', 1)
            ]));
        }
    }

    /**
     * Update data
     *
     * @param \Domain\Training\DataTransferObjects\LevelDTO $levelDTO
     * @param int|string $id
     *
     * @return array
     */
    public function update(LevelDTO $levelDTO, $id): array
    {
        $level = app(SaveLevelAction::class) ->execute($levelDTO, $id);

        return success_response($level, trans('lang-resources::commons.messages.completed.update'));
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
        $level = DataHelper::getEntityById($this ->levelRepository ->model(), $id, false, ['id']);
        $level ->delete();

        return success_response($level, trans('lang-resources::commons.messages.completed.deletion'));
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
        $level = DataHelper::getEntityById($this ->levelRepository ->model(), $id, true, ['id']);
        $level ->restore();

        return success_response($level, trans('lang-resources::commons.messages.completed.restoration'));
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
        $level = DataHelper::getEntityById($this ->levelRepository ->model(), $id, true, ['id']);
        $level ->forceDelete();

        return success_response(null, trans('lang-resources::commons.messages.completed.permanent_deletion'));
    }
}