<?php

namespace Domain\Training\Services;

use App\Support\Facades\DataHelper;
use Domain\Training\Actions\SaveContentTypeAction;
use Domain\Training\DataTransferObjects\ContentTypeDTO;
use Domain\Training\Repositories\ContentTypeRepository;
use Illuminate\Http\Response;

class ContentTypeService
{
    /**
     * @var \Domain\Training\Repositories\ContentTypeRepository
     */
    protected $contentTypeRepository;

    /**
     * Create new service instance.
     *
     * @param \Domain\Training\Repositories\ContentTypeRepository $contentTypeRepository
     * 
     * @return void
     */
    public function __construct(ContentTypeRepository $contentTypeRepository)
    {
        $this ->contentTypeRepository = $contentTypeRepository;
    }

    /**
     * Return repository instance
     *
     * @return \Domain\Training\Repositories\ContentTypeRepository
     */
    public function fromRepo()
    {
        return $this->contentTypeRepository;
    }

    /**
     * Create new data
     *
     * @param \Domain\Training\DataTransferObjects\ContentTypeDTO $contentTypeDTO
     *
     * @return array
     */
    public function create(ContentTypeDTO $contentTypeDTO): array
    {
        $contentType = app(SaveContentTypeAction::class) ->execute($contentTypeDTO);

        return success_response($contentType, trans('lang-resources::commons.messages.completed.creation'), Response::HTTP_CREATED);
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
        $contentType = DataHelper::getEntityById($this ->contentTypeRepository ->model(), $id, $inTrashed, $columns);

        if (is_null($contentType)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($contentType, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.contentType', 1)
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
        $contentType = DataHelper::findEntityByField($this ->contentTypeRepository ->model(), $field, $value, $inTrashed, $columns);

        if (is_null($contentType)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($contentType, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.contentType', 1)
            ]));
        }
    }

    /**
     * Update data
     *
     * @param \Domain\Training\DataTransferObjects\ContentTypeDTO $contentTypeDTO
     * @param int|string $id
     *
     * @return array
     */
    public function update(ContentTypeDTO $contentTypeDTO, $id): array
    {
        $contentType = app(SaveContentTypeAction::class) ->execute($contentTypeDTO, $id);

        return success_response($contentType, trans('lang-resources::commons.messages.completed.update'));
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
        $contentType = DataHelper::getEntityById($this ->contentTypeRepository ->model(), $id, false, ['id']);
        $contentType ->delete();

        return success_response($contentType, trans('lang-resources::commons.messages.completed.deletion'));
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
        $contentType = DataHelper::getEntityById($this ->contentTypeRepository ->model(), $id, true, ['id']);
        $contentType ->restore();

        return success_response($contentType, trans('lang-resources::commons.messages.completed.restoration'));
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
        $contentType = DataHelper::getEntityById($this ->contentTypeRepository ->model(), $id, true, ['id']);
        $contentType ->forceDelete();

        return success_response(null, trans('lang-resources::commons.messages.completed.permanent_deletion'));
    }
}