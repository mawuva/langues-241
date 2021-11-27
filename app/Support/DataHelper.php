<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class DataHelper
{
    /**
     * Build query to get entity data by field value
     *
     * @param string $model
     * @param string $field
     * @param string $value
     * @param bool $inTrashed
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getEntityByFieldQuery($model, $field, $value = null, $inTrashed = false): Builder
    {
        $data = app($model) ->where($field, '=', $value);

        return ($inTrashed)
                    ? $data ->withTrashed()
                    : $data;
    }

    /**
     * Get entity resource by field and value
     *
     * @param string $model
     * @param string $field
     * @param string $value
     * @param bool $inTrashed
     * @param array $columns
     *
     * @return mixed
     */
    public function getEntityByField($model, $field, $value = null, $inTrashed = false, $columns = ['*'])
    {
        return $this ->getEntityByFieldQuery($model, $field, $value, $inTrashed) ->get($columns);
    }

    /**
     * Find entity resource by field and value
     *
     * @param string $model
     * @param string $field
     * @param string $value
     * @param bool $inTrashed
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findEntityByField($model, $field, $value = null, $inTrashed = false, $columns = ['*']): Model
    {
        return $this ->getEntityByFieldQuery($model, $field, $value, $inTrashed) ->first($columns);
    }

    /**
     * Get entity resource by id
     *
     * @param string $model
     * @param string|int $id
     * @param bool $inTrashed
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntityById($model, $id, $inTrashed = false, $columns = ['*']): Model
    {
        $key = resolve_key_to_use($model, $id, $inTrashed);

        return $this ->getEntityByFieldQuery($model, $key, $id, $inTrashed) ->first($columns);
    }

    /**
     * Resolve model instance to use when create or update data
     *
     * @param string $model
     * @param string|int $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function resolveModelInstance($model, $id = null): Model
    {
        return ($id !== null) ? $this ->getEntityById($model, $id) : app($model);
    }
}