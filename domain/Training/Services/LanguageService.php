<?php

namespace Domain\Training\Services;

use App\Support\Facades\DataHelper;
use Domain\Training\Actions\SaveLanguageAction;
use Domain\Training\DataTransferObjects\LanguageDTO;
use Domain\Training\Repositories\LanguageRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class LanguageService
{
    /**
     * @var \Domain\Training\Repositories\LanguageRepository
     */
    protected $languageRepository;

    /**
     * Create new service instance.
     *
     * @param \Domain\Training\Repositories\LanguageRepository $languageRepository
     * 
     * @return void
     */
    public function __construct(LanguageRepository $languageRepository)
    {
        $this ->languageRepository = $languageRepository;
    }

    /**
     * Return repository instance
     *
     * @return \Domain\Training\Repositories\LanguageRepository
     */
    public function fromRepo()
    {
        return $this->languageRepository;
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
        $courseChapters = $this->languageRepository
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
     * Create new data
     *
     * @param \Domain\Training\DataTransferObjects\LanguageDTO $languageDTO
     *
     * @return array
     */
    public function create(LanguageDTO $languageDTO): array
    {
        $language = app(SaveLanguageAction::class) ->execute($languageDTO);

        return success_response($language, trans('lang-resources::commons.messages.completed.creation'), Response::HTTP_CREATED);
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
        $language = DataHelper::getEntityById($this ->languageRepository ->model(), $id, $inTrashed, $columns);

        if (is_null($language)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($language, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.language', 1)
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
        $language = DataHelper::findEntityByField($this ->languageRepository ->model(), $field, $value, $inTrashed, $columns);

        if (is_null($language)) {
            return failure_response(null, trans('lang-resources::commons.messages.resource.not_found'), Response::HTTP_NO_CONTENT);
        }

        else {
            return success_response($language, trans('lang-resources::commons.messages.entity.resource', [
                'Entity' => trans_choice('entity.language', 1)
            ]));
        }
    }

    /**
     * Update data
     *
     * @param \Domain\Training\DataTransferObjects\LanguageDTO $languageDTO
     * @param int|string $id
     *
     * @return array
     */
    public function update(LanguageDTO $languageDTO, $id): array
    {
        $language = app(SaveLanguageAction::class) ->execute($languageDTO, $id);

        return success_response($language, trans('lang-resources::commons.messages.completed.update'));
    }

    /**
     * Change language image
     *
     * @param int|string $id
     * 
     * @return array
     */
    public function updateImage($id)
    {
        $language = DataHelper::getEntityById($this ->languageRepository ->model(), $id, false, ['id']);

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
        $language = DataHelper::getEntityById($this ->languageRepository ->model(), $id, false, ['id']);
        $language ->delete();

        return success_response($language, trans('lang-resources::commons.messages.completed.deletion'));
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
        $language = DataHelper::getEntityById($this ->languageRepository ->model(), $id, true, ['id']);
        $language ->restore();

        return success_response($language, trans('lang-resources::commons.messages.completed.restoration'));
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
        $language = DataHelper::getEntityById($this ->languageRepository ->model(), $id, true, ['id']);
        $language ->image ->delete();
        
        Storage::delete([
            $language ->image ->url, 
            $language ->image ->url_sm, 
            $language ->image ->url_md, 
            $language ->image ->url_lg
        ]);
        
        $language ->forceDelete();

        return success_response(null, trans('lang-resources::commons.messages.completed.permanent_deletion'));
    }
}