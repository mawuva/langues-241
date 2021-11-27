<?php

namespace Domain\Admin\Repositories\Criteria\User;

use Mawuekom\Repository\Contracts\RepositoryContract as Repository;
use Mawuekom\Repository\Criteria\Criteria;

class IsNotAdmin extends Criteria
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
        return $model ->whereNull('is_admin');
    }
}