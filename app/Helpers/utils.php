<?php

use Illuminate\Filesystem\Filesystem;

if ( ! function_exists('success_response')) {
    /**
     * Return array of response
     *
     * @param array|null|Object $data
     * @param string $message
     * @param int $code
     * 
     * @return array
     */
    function success_response($data = null, string $message = 'Action performed successfully', int $code = 200): array {
        return [
            'code'      => $code,
            'status'    => 'success',
            'message'   => $message,
            'data'      => $data,
        ];
    }
}

if ( ! function_exists('failure_response')) {
    /**
     * Return array of response
     *
     * @param array|null|Object $data
     * @param string $message
     * @param int $code
     * 
     * @return array
     */
    function failure_response($data = null, string $message = 'Action attempted failed', int $code = 0): array {
        return [
            'code'      => $code,
            'status'    => 'failed',
            'message'   => $message,
            'data'      => $data,
        ];
    }
}

if (!function_exists('resolve_key_to_use')) {
    /**
     * Get key to use to make queries
     * 
     * @param string $config
     * @param string $entity
     * @param int|string $id
     * @param bool $inTrashed
     * 
     * @return string|null
     */
    function resolve_key_to_use(string $model, $id = null, $inTrashed = false) {
        $uuidColumn     = '_id';
        $entityPK       = 'id';

        return (is_the_given_id_a_uuid($uuidColumn, $id, $model, $inTrashed))
                    ? $uuidColumn
                    : $entityPK;
    }
}