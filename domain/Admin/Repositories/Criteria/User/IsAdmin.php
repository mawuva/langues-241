<?php

namespace Domain\Admin\Repositories\Criteria\User;

use Mawuekom\Repository\Contracts\RepositoryContract as Repository;
use Mawuekom\Repository\Criteria\Criteria;

class IsAdmin extends Criteria
{
    /**
     * Apply criteria
     * 
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param \App\Repositories\Contracts\RepositoryContract $repository
     * 
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        return $model ->where('is_admin', '=', '1');
    }
}